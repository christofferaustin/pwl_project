<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;
use App\Models\Jurusan;
use App\Models\User;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dosen.index', [
            'dosen' => Dosen::with('jurusan')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dosen.create', [
            'jurusan' => Jurusan::all(),
            'users'   => $this->availableUsers(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Fullname'             => 'required|max:255',
            'NIP'                  => 'required|unique:table_dosen,NIP',
            'NIDN'                 => 'required|unique:table_dosen,NIDN',
            'Pendidikan_Terakhir'  => 'required',
            'Jurusan_id'           => 'required|exists:table_jurusan,id',
            'Tempat_Lahir'         => 'required',
            'Tanggal_Lahir'        => 'required|date',
            'Alamat'               => 'required',
            'user_id'              => 'nullable|exists:users,id|unique:table_dosen,user_id',
        ]);

        Dosen::create($request->all());

        return redirect()->route('dosen.index')->with('success', 'Data dosen berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('dosen.show', [
            'dosen' => Dosen::with('jurusan')->findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit ($id)
    {
        $dosen = Dosen::findOrFail($id);

        return view('dosen.edit', [
            'dosen' => $dosen,
            'jurusan' => Jurusan::all(),
            'users' => $this->availableUsers($dosen->user_id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'Fullname'             => 'required|max:255',
            'NIP'                  => "required|unique:table_dosen,NIP,$id",
            'NIDN'                 => "required|unique:table_dosen,NIDN,$id",
            'Pendidikan_Terakhir'  => 'required',
            'Jurusan_id'           => 'required|exists:table_jurusan,id',
            'Tempat_Lahir'         => 'required',
            'Tanggal_Lahir'        => 'required|date',
            'Alamat'               => 'required',
            'user_id'              => "nullable|exists:users,id|unique:table_dosen,user_id,$id",
        ]);

        Dosen::findOrFail($id)->update($request->all());

        return redirect()->route('dosen.index')->with('success', 'Data dosen berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Dosen::findOrFail($id)->delete();

        return redirect()->route('dosen.index')->with('success', 'Data dosen berhasil dihapus.');
    }

    /**
     * Akun dengan role "dosen" yang belum ditautkan ke data Dosen manapun
     * (atau sedang ditautkan ke $currentUserId, supaya tetap muncul saat edit).
     */
    private function availableUsers($currentUserId = null)
    {
        return User::where('role', 'dosen')
            ->where(function ($q) use ($currentUserId) {
                $q->whereDoesntHave('dosen');
                if ($currentUserId) {
                    $q->orWhere('id', $currentUserId);
                }
            })
            ->get();
    }
}