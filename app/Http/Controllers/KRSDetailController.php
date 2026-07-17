<?php

namespace App\Http\Controllers;

use App\Models\KRSDetail;
use App\Models\KRS;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KRSDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('krsdetail.index',[
            'detail'=>KRSDetail::with(['kelas.mataKuliah', 'kelas.dosen', 'krs.mahasiswa'])->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'krs_id'=>'required|exists:table_krs,id',
            'kelas_id'=>'required|exists:table_kelas,id'
        ]);

        $krs = KRS::findOrFail($request->krs_id);
        $this->authorizeOwner($krs);

        if (
            KRSDetail::where('krs_id',$request->krs_id)
            ->where('kelas_id',$request->kelas_id)
            ->exists()
        ){
            return back()->with('error','Kelas sudah dipilih.');
        }

        $kelas = Kelas::findOrFail($request->kelas_id);

        if($kelas->jumlah_mahasiswa >= $kelas->jumlah_max){
            return back()->with('error','Kelas penuh.');
        }

        KRSDetail::create([
            'krs_id'=>$request->krs_id,
            'kelas_id'=>$request->kelas_id,
            'status'=>'pending'
        ]);

        $kelas->increment('jumlah_mahasiswa');

        $this->updateTotalSKS($request->krs_id);
        $this->updateStatusKRS($request->krs_id);

        return back()->with('success', 'Mata kuliah berhasil ditambahkan.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $detail = KRSDetail::with('kelas')->findOrFail($id);

        $request->validate([
            'status' => 'required|in:pending,approved,declined'
        ]);

        $this->applyStatus($detail, $request->status);

        $this->updateTotalSKS($detail->krs_id);
        $this->updateStatusKRS($detail->krs_id);

        return back();
    }

    public function approve($id)
    {
        $detail = KRSDetail::with('kelas')->findOrFail($id);
        $this->applyStatus($detail, 'approved');

        $this->updateStatusKRS($detail->krs_id);

        return back();
    }

    public function reject($id)
    {
        $detail = KRSDetail::with('kelas')->findOrFail($id);
        $this->applyStatus($detail, 'declined');

        $this->updateStatusKRS($detail->krs_id);

        return back();
    }

    /**
     * Ganti status KRSDetail sambil menjaga jumlah_mahasiswa di Kelas tetap akurat.
     * Kelas 'declined' tidak boleh dihitung sebagai kursi terisi; begitu detail
     * ditolak, kursinya dilepas, dan kalau nanti di-approve lagi, kursinya diisi lagi.
     */
    private function applyStatus(KRSDetail $detail, string $newStatus)
    {
        $wasDeclined = $detail->status === 'declined';
        $willBeDeclined = $newStatus === 'declined';

        if ($wasDeclined && !$willBeDeclined) {
            $detail->kelas->increment('jumlah_mahasiswa');
        } elseif (!$wasDeclined && $willBeDeclined) {
            $detail->kelas->decrement('jumlah_mahasiswa');
        }

        $detail->status = $newStatus;
        $detail->save();
    }

    private function updateTotalSKS($krsId)
    {
        $krs = KRS::with('detail.kelas.mataKuliah')
            ->findOrFail($krsId);

        $total = 0;

        foreach ($krs->detail as $detail) {
            $total += $detail->kelas->mataKuliah->SKS;
        }

        $krs->update([
            'total_sks' => $total
        ]);
    }

    private function updateStatusKRS($krsId)
    {
        $krs = KRS::with('detail')->findOrFail($krsId);

        $total = $krs->detail->count();

        if ($total === 0) {
            // Belum ada mata kuliah yang dipilih sama sekali, jangan dianggap approved/declined.
            $status = 'pending';
        } else {
            $approved = $krs->detail->where('status', 'approved')->count();
            $pending = $krs->detail->where('status', 'pending')->count();
            $declined = $krs->detail->where('status', 'declined')->count();

            if ($pending > 0) {
                $status = 'pending';
            } elseif ($approved == $total) {
                $status = 'approved';
            } elseif ($declined == $total) {
                $status = 'declined';
            } else {
                $status = 'partial';
            }
        }

        $krs->update([
            'status' => $status
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $detail = KRSDetail::with('krs', 'kelas')->findOrFail($id);
        $this->authorizeOwner($detail->krs);

        $krsId = $detail->krs_id;
        $kelas = $detail->kelas;
        $wasDeclined = $detail->status === 'declined';
        $detail->delete();

        // Kalau sudah declined, kursinya sudah dilepas duluan saat direject — jangan dikurangi dua kali.
        if (!$wasDeclined) {
            $kelas->decrement('jumlah_mahasiswa');
        }

        $this->updateTotalSKS($krsId);
        $this->updateStatusKRS($krsId);

        return back()->with('success', 'Mata kuliah berhasil dihapus dari KRS.');
    }

    /**
     * Pastikan mahasiswa yang login hanya bisa mengubah KRS miliknya sendiri.
     * Admin & dosen tidak dibatasi di sini (aksesnya sudah diatur lewat middleware role).
     */
    private function authorizeOwner(KRS $krs)
    {
        if (Auth::user()->role === 'mahasiswa') {
            $mahasiswaId = optional(Auth::user()->mahasiswa)->id;

            if ((int) $krs->kode_mahasiswa !== (int) $mahasiswaId) {
                abort(403, 'Anda tidak memiliki akses ke KRS ini.');
            }
        }
    }
}