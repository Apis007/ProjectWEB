<?php

namespace App\Http\Controllers;
use App\Models\DataUser;
use App\Models\DataUnit;
use App\Models\Pemesanan;


use Illuminate\Http\Request;

class PemesananController extends Controller
{
    public function index()
    {
        $users = DataUser::all();
        $pemesanans = Pemesanan::all();
        $dataUnits = DataUnit::all();


        return view('pages.pemesanan', compact('users', 'pemesanans', 'dataUnits'));
    }
    public function user()
    {
        return $this->belongsTo(DataUser::class, 'id_user');
    }

    public function unit()
    {
        return $this->belongsTo(DataUnit::class, 'id_unit');
    }


    public function store(Request $request)
{
    $validatedData = $request->validate([
        'id_user' => 'required',
        'id_unit' => 'required',
        'platnomor' => 'required',
        'tanggal_pemesanan' => 'required',
        'tanggal_pengembalian' => 'required',
        'status' => 'required|in:Sedang disewa,Telah dikembalikan',
        'jumlah_hari' => 'required|integer|min:1',
        'hargatotal' => 'required|numeric|min:0',
        'denda' => 'required|numeric|min:0',
    ]);

    $pemesanan = new Pemesanan();
    $pemesanan->id_user = $validatedData['id_user'];
    $pemesanan->id_unit = $validatedData['id_unit'];
    $pemesanan->platnomor = $validatedData['platnomor'];
    $pemesanan->tanggal_pemesanan = $validatedData['tanggal_pemesanan'];
    $pemesanan->tanggal_pengembalian = $validatedData['tanggal_pengembalian'];
    $pemesanan->status = $validatedData['status'];
    $pemesanan->jumlah_hari = $validatedData['jumlah_hari'];
    $pemesanan->hargatotal = $validatedData['hargatotal'];
    $pemesanan->denda = $validatedData['denda'];

    $pemesanan->save();

    return redirect()->route('pemesanan.index')->with('success', 'Pemesanan berhasil ditambahkan!');
}


    public function create()
    {
        $users = DataUser::all();
        $dataUnits = DataUnit::all();

        return view('pages.pemesanan.create', compact('users', 'dataUnits'));
    }

    public function destroy($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);

        // Menghapus data pemesanan
        $pemesanan->delete();

        return redirect()->route('pemesanan.index')->with('success', 'Data pemesanan berhasil dihapus!');
    }

    public function update(Request $request, $id)
    {
    $validatedData = $request->validate([
        'id_user' => 'required',
        'id_unit' => 'required',
        'platnomor' => 'required',
        'tanggal_pemesanan' => 'required',
        'tanggal_pengembalian' => 'required',
        'status' => 'required|in:Sedang disewa,Telah dikembalikan',
        'jumlah_hari' => 'required|integer|min:1',
        'hargatotal' => 'required|numeric|min:0',
        'denda' => 'required|numeric|min:0',
    ]);

    $pemesanan = Pemesanan::findOrFail($id);
    $pemesanan->id_user = $validatedData['id_user'];
    $pemesanan->id_unit = $validatedData['id_unit'];
    $pemesanan->platnomor = $validatedData['platnomor'];
    $pemesanan->tanggal_pemesanan = $validatedData['tanggal_pemesanan'];
    $pemesanan->tanggal_pengembalian = $validatedData['tanggal_pengembalian'];
    $pemesanan->status = $validatedData['status'];
    $pemesanan->jumlah_hari = $validatedData['jumlah_hari'];
    $pemesanan->hargatotal = $validatedData['hargatotal'];
    $pemesanan->denda = $validatedData['denda'];

    $pemesanan->save();

    return redirect()->route('pemesanan.index')->with('success', 'Pemesanan berhasil diperbarui!');
    }

    public function edit($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);
        $users = DataUser::all();
        $dataUnits = DataUnit::all();

        return view('pages.editpemesanan', compact('pemesanan', 'users', 'dataUnits'));
    }


}
