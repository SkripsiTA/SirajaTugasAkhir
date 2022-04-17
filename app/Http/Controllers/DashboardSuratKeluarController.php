<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardSuratKeluarController extends Controller
{
    public function index()
    {
        return view('admin.suratkeluar.dashboard-surat-keluar');
    }
}
