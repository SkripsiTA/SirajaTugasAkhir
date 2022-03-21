<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DesaAdat;
use App\Models\Kecamatan;

class DesaAdatController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $desa = DesaAdat::paginate(10);
        $kec = Kecamatan::all();
        return view('superadmin.masterdata.wilayah.desa',compact(['desa','kec']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'desa_id' => 'required|max:10',
            'nama_desa' => 'required',
            'kecamatan_id' => 'required',
            'status_desa' => 'required',
            'desa_jenis' => 'required',
            'alamat_kantor_desa' => 'required',
        ]);

        DesaAdat::create([
            'desa_id' => $request->desa_id,
            'nama_desa' => $request->nama_desa,
            'kecamatan_id' => $request->kecamatan_id,
            'status_desa' => $request->status_desa,
            'desa_jenis' => $request->desa_jenis,
            'alamat_kantor_desa' => $request->alamat_desa,
        ]);

        return redirect('desa')->with('toast_success', 'Data berhasil ditambahkan!');
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
        $desaedit = DesaAdat::findOrFail($id);
        return view('superadmin.masterdata.wilayah.desa',compact('desaedit'));
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
        $desadelete = DesaAdat::findOrFail($id);
        $desadelete->delete();

        return back()->with('toast_success', 'Data berhasil dihapus!');
    }
}
