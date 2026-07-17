<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MataKuliah;
use App\Models\Jurusan;
use App\Models\Dosen;

class MataKuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //return Mahasiswa::all();\
        return view('matakuliah.index', [
            'matakuliah' => MataKuliah::with(['jurusan', 'dosen'])->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('matakuliah.create', [
            'jurusan' => Jurusan::all(),
            'dosen' => Dosen::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Jurusan_Id' => 'required|exists:table_jurusan,id',
            'Kode_Mata_Kuliah' => 'required|max:20|unique:table_mata_kuliah,Kode_Mata_Kuliah',
            'Nama_Mata_Kuliah' => 'required|max:255',
            'SKS' => 'required|integer|min:1|max:6',
            'Dosen_Id' => 'required|exists:table_dosen,id',
        ]);

        MataKuliah::create($request->all());

        return redirect()->route('matakuliah.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('matakuliah.show', [
        'matakuliah' => MataKuliah::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit ($id)
    {
        return view('matakuliah.edit', [
            'matakuliah' => MataKuliah::findOrFail($id),
            'jurusan' => Jurusan::all(),
            'dosen' => Dosen::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'Jurusan_Id' => 'required|exists:table_jurusan,id',
            'Kode_Mata_Kuliah' => "required|max:20|unique:table_mata_kuliah,Kode_Mata_Kuliah,$id",
            'Nama_Mata_Kuliah' => 'required|max:255',
            'SKS' => 'required|integer|min:1|max:6',
            'Dosen_Id' => 'required|exists:table_dosen,id',
        ]);

        MataKuliah::findOrFail($id)->update($request->all());

        return redirect()->route('matakuliah.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        MataKuliah::findOrFail($id)->delete();

        return redirect()->route('matakuliah.index');
    }
}