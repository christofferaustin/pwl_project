<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Dosen;
use App\Models\MataKuliah;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        return view('kelas.index', [
            'kelas' => Kelas::with(['dosen', 'mataKuliah'])->get() // Gunakan eager loading agar nama dosen & matkul langsung terbaca
        ]);
    }

    public function create()
    {
        return view('kelas.create', [
            'dosen' => Dosen::get(),
            'matakuliah' => MataKuliah::get(),
            'hari' => Kelas::ListHari(),
            'jam' => Kelas::ListJam(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_kelas'=>'required|unique:table_kelas,kode_kelas',
            'kode_mata_kuliah'=>'required|exists:table_mata_kuliah,id',
            'kode_dosen'=>'required|exists:table_dosen,id',
            'hari'=>'required',
            'jam'=>'required',
            'tahun_ajaran'=>'required',
            'ruang_kelas'=>'required',
            'jumlah_max'=>'required|integer|min:1',
            'semester'=>'required'
        ]);

        $data = $request->except('_token');
        Kelas::create($data);

        return redirect()->route('kelas.index');
    }

    public function show($id)
    {
        return view('kelas.show', [
            'kelas' => Kelas::with(['dosen', 'mataKuliah'])->findOrFail($id)
        ]);
    }

    // Catatan: sesuai arahan dosen, Kelas tidak memiliki fitur edit/update.

    public function destroy($id)
    {
        Kelas::findOrFail($id)->delete();
        return redirect()->route('kelas.index');
    }
}