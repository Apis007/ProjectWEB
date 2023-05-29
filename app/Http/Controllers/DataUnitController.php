<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\DataUnit;
use Illuminate\Http\Request;

class DataUnitController extends Controller
{
    public function index()
    {
        $dataUnits = DataUnit::all();
        return view('pages.datakendaraan', compact('dataUnits'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'gambar' => 'required',
            'jeniskendaraan' => 'required',
            'hargasewa' => 'required|numeric'
        ]);

        $dataUnit = new DataUnit();
        $dataUnit->nama = $validatedData['nama'];
        $dataUnit->gambar = $validatedData['gambar'];
        $dataUnit->jeniskendaraan = $validatedData['jeniskendaraan'];
        $dataUnit->hargasewa = $validatedData['hargasewa'];

        $dataUnit->save();
        return redirect()->route('dataUnits.index')->with('success', 'Data unit berhasil ditambahkan!');
    }


    public function show($id_unit)
    {
        $dataUnit = DataUnit::findOrFail($id_unit);
        return view('data_units.show', compact('dataUnit'));
    }

    public function edit($id_unit)
    {
        $dataUnit = DataUnit::find($id_unit);
        return view('pages.editunit', compact('dataUnit'));
    }

    public function update(Request $request, $id_unit)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nama' => 'required',
            'jeniskendaraan' => 'required',
            'hargasewa' => 'required|numeric',
            'gambar' => 'required'
        ]);
        // Update data unit
        $dataUnit = DataUnit::find($id_unit);
        $dataUnit->nama = $validatedData['nama'];
        $dataUnit->jeniskendaraan = $validatedData['jeniskendaraan'];
        $dataUnit->hargasewa = $validatedData['hargasewa'];
        $dataUnit->gambar = $validatedData['gambar'];
        $dataUnit->save();
        return redirect()->route('dataUnits.index')
            ->with('success', 'Data unit berhasil diperbarui.');
    }

    public function destroy($id_unit)
    {
        // Cari data unit dengan id_unit yang sesuai
        $dataUnit = DataUnit::find($id_unit);

        // Hapus data unit
        $dataUnit->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('dataUnits.index')->with('success', 'Data unit berhasil dihapus.');
    }

}
