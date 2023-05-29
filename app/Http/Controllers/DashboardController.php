<?php

namespace App\Http\Controllers;
use App\Models\DataUser;
use App\Models\DataUnit;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function index()
    {
        $adminCount = DataUser::where('role', 'admin')->count();
        $userCount = DataUser::where('role', 'user')->count();
        $pemesanans = Pemesanan::count();
        $dataUnits = DataUnit::count();

        // Hitung kendaraan yang sedang disewa
        $kendaraanDisewaCount = Pemesanan::where('status', 'Sedang Disewa')->count();

        // Logika dan data terkait dashboard

        return view('dashboard', compact('adminCount', 'userCount', 'pemesanans', 'dataUnits', 'kendaraanDisewaCount'));
    }



}
