<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NomorSurat;
use App\Models\DetailNomorSurat;
use Illuminate\Support\Facades\Response;

class NomorSuratController extends Controller
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
        $nomorsurat = NomorSurat::paginate(10);

        return view('admin.masterdata.surat.nomor-surat',compact('nomorsurat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.masterdata.surat.add-nomor-surat');
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
        // $nomorsurat = new NomorSurat;
        // $nomorsurat->kode_nomor_surat = $request->kode_nomor_surat;
        // $nomorsurat->keterangan = $request->keterangan;
        // $nomorsurat->save();

        // $detailnomorsurat = new DetailNomorSurat;
        // $detailnomorsurat->kode_detail_surat = $request->kode_detail_surat;
        // $detailnomorsurat->keterangan = $request->rincian;
        // $detailnomorsurat->master_surat_id = $nomorsurat->master_surat_id;
        // $detailnomorsurat->save();
        // if(count($request->kode_detail_surat)> 0) {
        //     foreach($request->kode_detail_surat as $data) {
        //         $data2 = array(
        //             'kode_detail_surat' => $request->kode_detail_surat[$data],
        //             'keterangan' => $request->rincian[$data],
        //             'master_surat_id' => $nomorsurat->master_surat_id,
        //         );
        //         DetailNomorSurat::create($data2);

        //     }
        // }

        // return redirect('nomor-surat')->with('toast_success', 'Data berhasil ditambahkan!');

        $data = $request->validate([
            'kode_nomor_surat' => 'required',
            'keterangan' => 'required',
        ]);

        $nomorsurat = NomorSurat::create($data);

        return Response::json($nomorsurat);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nomorsurat = NomorSurat::with('detailnomorsurat')->where('master_surat_id', $id)->first();

        return view('nomor-surat', compact('nomorsurat'));
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
        $nomorsurat = NomorSurat::findorFail($id);

        $data = $request->validate([
            'kode_nomor_surat' => 'required',
            'keterangan' => 'required',
        ]);

        $nomorsurat->update($data);

        return Response::json($nomorsurat);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nomorsurat = NomorSurat::findorFail($id);
        $nomorsurat->delete();
        return Response::json($nomorsurat);
    }
}
