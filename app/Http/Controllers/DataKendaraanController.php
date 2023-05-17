<?php

namespace App\Http\Controllers;

use App\Models\Datakendaraan;
use Illuminate\Http\Request;

class DataKendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_unit = Datakendaraan::orderBy('no_polisi', 'desc')->get();
        return view('pages.datakendaraan', compact('data_unit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data_unit = new Datakendaraan();

    $data_unit->nama = $request->input('nama');
    $data_unit->no_polisi = $request->input('no_polisi');
    $data_unit->gambar = $request->input('gambar');
    $data_unit->jeniskendaraan = $request->input('jeniskendaraan');
    $data_unit->hargasewa = $request->input('hargasewa');

    $data_unit->save();

    return redirect()->route('datakendaraan.index')->with('success', 'Data berhasil ditambahkan.');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($no_polisi)
    {
        $data_unit = Datakendaraan::where('no_polisi', 'id_unit')->first();
        return view('pages.datakendaraan.Edit')->with('Datakendaraan', $data_unit);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $data_unit = Datakendaraan::find($id);

        $data_unit->nama = $request->input('nama');
        $data_unit->no_polisi = $request->input('no_polisi');
        $data_unit->gambar = $request->input('gambar');
        $data_unit->jeniskendaraan = $request->input('jeniskendaraan');
        $data_unit->hargasewa = $request->input('hargasewa');

        $data_unit->save();

        return redirect()->route('datakendaraan.index')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($gambar)
    {
         Datakendaraan::find($gambar)->delete();

        return back()->with('succes', 'Data Dihapus');

    }
}
