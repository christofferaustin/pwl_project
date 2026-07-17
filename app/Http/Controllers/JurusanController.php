<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\jurusan;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //return Mahasiswa::all();\
        return view('jurusan.index', [
            'jurusan' => Jurusan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jurusan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');

        jurusan::create($data);

        return redirect()->action([JurusanController::class, 'index']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('jurusan.show', [
        'jurusan' => Jurusan::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit ($id)
    {
        return view('jurusan.edit', [
            'jurusan' => Jurusan::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->except('_token');

        Jurusan::findOrFail($id)->update($data);

        return redirect()->action([JurusanController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Jurusan::findOrFail($id)->delete();

        return redirect()->action([JurusanController::class, 'index']);
    }
}