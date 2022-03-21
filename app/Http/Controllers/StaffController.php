<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Staff;
use App\Models\Jabatan;
use App\Models\Penduduk;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $staff = Staff::with(['jabatan','penduduk','desa', 'unit'])->get();

        return view('admin.masterdata.pegawai.staff', compact('staff'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $staff = Staff::with(['jabatan','penduduk','desa', 'unit'])->get();
        $penduduk = Penduduk::all();
        $jabatan = Jabatan::all();
        $unit = Unit::all();

        return view('admin.masterdata.pegawai.add-staff', compact('penduduk', 'jabatan', 'unit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
