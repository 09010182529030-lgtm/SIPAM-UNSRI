<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Aspirasi;

class AdminController extends Controller
{
    public function index()
    {
        if (!session('admin_login')) {
            return redirect()->route('admin.login');
        }

        $pengaduan = Pengaduan::latest()->get();
        $aspirasi = Aspirasi::latest()->get();

        return view('admin.dashboard', compact(
            'pengaduan',
            'aspirasi'
        ));
    }
}