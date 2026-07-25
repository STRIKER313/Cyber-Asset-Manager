<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function adminAbout(Request $request)
    {
        if (!$request->session()->get('admin_logged_in')) {
            return redirect()->route('login_admin');
        }
        
        $adminName = $request->session()->get('admin_name');
        
        return view('admin-about', [
            'admin_name' => $adminName,
        ]);
    }

    public function dashboardOperator(Request $request)
    {
        // 1. Ambil ID Operator dari sesi
        $userId = $request->session()->get('user_id');
        
        // 2. Ambil data lengkap Operator dari DB
        $operator = DB::table('users')->find($userId);

        // Pengecekan keamanan dan ketersediaan data
        if (!$operator || $operator->role !== 'operator') {
             $request->session()->flush();
             return redirect()->route('login-operator')->with('error', 'Akses ditolak atau sesi tidak valid.');
        }

        // 3. Hitung Statistik Aset
        $totalAssets = DB::table('assets')->count(); 
        
        // Asumsi tabel 'assets' memiliki kolom 'status' (misalnya 'in_use', 'available')
        // Ganti 'in_use' sesuai dengan nilai yang kamu gunakan di kolom status aset kamu
        $assetsInUse = DB::table('assets')
                         ->where('status', 'in_use') 
                         ->count(); 
        
        // 4. Kirim semua data yang dibutuhkan ke view
        return view('dashboard-operator', [
            'operator'      => $operator,       // Fix untuk $operator->name
            'total_assets'  => $totalAssets,   // Fix untuk Undefined $total_assets
            'assets_in_use' => $assetsInUse,   // Mengirim data baru
        ]);
    }
}   
