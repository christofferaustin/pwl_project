<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\User;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('mahasiswa.index', [
            'mahasiswa' => Mahasiswa::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mahasiswa.create', [
            'users' => $this->availableUsers(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Fullname'=>'required|max:255',
            'NIM'=>'required|unique:table_mahasiswa,NIM',
            'Tempat_Lahir'=>'required',
            'Tanggal_Lahir'=>'required|date',
            'Alamat'=>'required',
            'user_id'=>'nullable|exists:users,id|unique:table_mahasiswa,user_id',
        ]);

        Mahasiswa::create($request->only([
            'Fullname', 'NIM', 'Tempat_Lahir', 'Tanggal_Lahir', 'Alamat', 'user_id',
        ]));

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('mahasiswa.show', [
            'mahasiswa' => Mahasiswa::with('user')->findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit ($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        return view('mahasiswa.edit', [
            'mahasiswa' => $mahasiswa,
            'users' => $this->availableUsers($mahasiswa->user_id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'Fullname'=>'required|max:255',
            'NIM'=>"required|unique:table_mahasiswa,NIM,$id",
            'Tempat_Lahir'=>'required',
            'Tanggal_Lahir'=>'required',
            'Alamat'=>'required',
            'user_id'=>"nullable|exists:users,id|unique:table_mahasiswa,user_id,$id",
        ]);

        $data = $request->only([
            'Fullname', 'NIM', 'Tempat_Lahir', 'Tanggal_Lahir', 'Alamat', 'user_id',
        ]);

        Mahasiswa::findOrFail($id)->update($data);

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       Mahasiswa::findOrFail($id)->delete();

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil dihapus.');
    }

    /**
     * Akun bikin role "mahasiswa" yang belum ditautkan ke data Mahasiswa manapun
     * (atau sedang ditautkan ke $currentUserId, supaya tetap muncul saat edit).
     */
    private function availableUsers($currentUserId = null)
    {
        return User::where('role', 'mahasiswa')
            ->where(function ($q) use ($currentUserId) {
                $q->whereDoesntHave('mahasiswa');
                if ($currentUserId) {
                    $q->orWhere('id', $currentUserId);
                }
            })
            ->get();
    }
}