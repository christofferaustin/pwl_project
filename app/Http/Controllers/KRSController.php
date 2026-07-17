<?php

namespace App\Http\Controllers;

use App\Models\KRS;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KRSController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = KRS::with('mahasiswa');

        // Mahasiswa hanya boleh melihat KRS miliknya sendiri.
        if (Auth::user()->role === 'mahasiswa') {
            $mahasiswa = Auth::user()->mahasiswa;

            if (!$mahasiswa) {
                return view('krs.index', ['krs' => collect()])
                    ->with('error', 'Akun kamu belum ditautkan ke data mahasiswa. Hubungi Admin.');
            }

            $query->where('kode_mahasiswa', $mahasiswa->id);
        }

        return view('krs.index', [
            'krs' => $query->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mahasiswa = Auth::user()->mahasiswa;

        if (!$mahasiswa) {
            return redirect()->route('krs.index')
                ->with('error', 'Akun kamu belum ditautkan ke data mahasiswa. Hubungi Admin.');
        }

        return view('krs.create', [
            'mahasiswa' => $mahasiswa,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $mahasiswa = Auth::user()->mahasiswa;

        if (!$mahasiswa) {
            return redirect()->route('krs.index')
                ->with('error', 'Akun kamu belum ditautkan ke data mahasiswa. Hubungi Admin.');
        }

        $request->validate([
            'tahun_ajaran'=>'required',
            'semester'=>'required|in:ganjil,genap',
        ]);

        $krs = KRS::create([
            'kode_mahasiswa' => $mahasiswa->id, // diambil dari akun yang login, bukan dari form
            'tahun_ajaran'   => $request->tahun_ajaran,
            'semester'       => $request->semester,
            'status'         => 'pending',
            'total_sks'      => 0,
        ]);

        return redirect()->route('krs.show', $krs->id);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $krs = KRS::with([
            'mahasiswa',
            'detail',
            'detail.kelas',
            'detail.kelas.dosen',
            'detail.kelas.mataKuliah'
        ])->findOrFail($id);

        // Mahasiswa hanya boleh melihat KRS miliknya sendiri.
        if (Auth::user()->role === 'mahasiswa') {
            $mahasiswaId = optional(Auth::user()->mahasiswa)->id;

            if ((int) $krs->kode_mahasiswa !== (int) $mahasiswaId) {
                abort(403, 'Anda tidak memiliki akses ke KRS ini.');
            }
        }

        // Daftar kelas yang tersedia untuk ditambahkan (belum dipilih & belum penuh).
        $sudahDipilih = $krs->detail->pluck('kelas_id');

        $kelasTersedia = Kelas::with(['mataKuliah', 'dosen'])
            ->where('tahun_ajaran', $krs->tahun_ajaran)
            ->where('semester', $krs->semester)
            ->whereNotIn('id', $sudahDipilih)
            ->whereColumn('jumlah_mahasiswa', '<', 'jumlah_max')
            ->get();

        return view('krs.show', compact('krs', 'kelasTersedia'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        KRS::findOrFail($id)->delete();

        return redirect()->route('admin.krs.index');
    }
}