<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\BanjarAdat;
use App\Models\KramaMipil;
use Illuminate\Http\Request;
use App\Models\PrajuruBanjarAdat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PrajuruBanjarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $prajurubanjar = PrajuruBanjarAdat::with(['banjaradat','kramamipil'])->paginate(10);

        // dd($prajurubanjar);

        return view('admin.masterdata.banjar.prajuru-banjar', compact('prajurubanjar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prajurubanjar = PrajuruBanjarAdat::first();
        $banjaradat = BanjarAdat::with('desaadat')->where('desa_adat_id', Auth::user()->desa_adat_id)->get();
        // dd($banjaradat);
        $kramamipil = KramaMipil::with(['banjaradat', 'cacahkramamipil'])->get();
        $akun = User::with(['penduduk','desaadat'])->first();

        return view('admin.masterdata.banjar.add-prajuru-banjar', compact('prajurubanjar', 'banjaradat', 'kramamipil', 'akun'));
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
        $prajurubanjar = new PrajuruBanjarAdat;
        $prajurubanjar->banjar_adat_id = $request->banjar_adat;
        $prajurubanjar->krama_mipil_id = $request->kramamipil_id;
        $prajurubanjar->jabatan = $request->nama_jabatan;
        $prajurubanjar->status_prajuru_banjar_adat = $request->status_prajuru_banjar;
        $prajurubanjar->tanggal_mulai_menjabat = $request->masa_mulai;
        $prajurubanjar->tanggal_akhir_menjabat = $request->masa_berakhir;
        $prajurubanjar->save();


        // dd($prajurudesaakun);
        $prajurubanjarakun = new User;
        $prajurubanjarakun->desa_adat_id = Auth::user()->desa_adat_id;
        $pendudukid = KramaMipil::with('cacahkramamipil.penduduk')->findOrFail($request->kramamipil_id);
        $prajurubanjarakun->penduduk_id = $pendudukid->cacahkramamipil->penduduk->penduduk_id;
        $prajurubanjarakun->email = $request->email;
        $prajurubanjarakun->password = Hash::make($request->password);
        $prajurubanjarakun->role = 'Kelihan Banjar';
        $prajurubanjarakun->save();

        return redirect()->route('prajuru-banjar-adat')->with('success', 'Data berhasil ditambahkan!');
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
        $editprajurubanjar = PrajuruBanjarAdat::with(['banjaradat','kramamipil'])->findOrFail($id);
        // dd($editprajurubanjar->banjaradat);
        $banjaradat = BanjarAdat::with('desaadat')->where('desa_adat_id', Auth::user()->desa_adat_id)->get();

        return view('admin.masterdata.banjar.edit-prajuru-banjar', compact('editprajurubanjar', 'banjaradat'));
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
        $updateprajurubanjar = PrajuruBanjarAdat::with(['banjaradat','kramamipil'])->findOrFail($id);
        $updateprajurubanjar->banjar_adat_id = $request->banjar_adat;
        $updateprajurubanjar->krama_mipil_id = $request->kramamipil_id;
        $updateprajurubanjar->jabatan = $request->nama_jabatan;
        $updateprajurubanjar->status_prajuru_banjar_adat = $request->status_prajuru_banjar;
        $updateprajurubanjar->tanggal_mulai_menjabat = $request->masa_mulai;
        $updateprajurubanjar->tanggal_akhir_menjabat = $request->masa_berakhir;
        $updateprajurubanjar->save();

        $updateprajurubanjarakun = User::findOrFail($updateprajurubanjar->kramamipil->cacahkramamipil->penduduk->user[0]->user_id);
        // dd($updateprajurubanjarakun);
        $updateprajurubanjarakun->desa_adat_id = Auth::user()->desa_adat_id;
        $pendudukid = KramaMipil::with('cacahkramamipil.penduduk')->findOrFail($request->kramamipil_id);
        $updateprajurubanjarakun->penduduk_id = $pendudukid->cacahkramamipil->penduduk->penduduk_id;
        $updateprajurubanjarakun->email = $request->email;
        $updateprajurubanjarakun->save();
        // dd($updateprajurubanjarakun);

        return redirect()->route('prajuru-banjar-adat')->with('success', 'Data berhasil diupdate!');
    }

    public function nonaktif(Request $request, $id)
    {
        $updateprajurubanjar = PrajuruBanjarAdat::with(['banjaradat','kramamipil'])->findOrFail($id);
        $updateprajurubanjar->status_prajuru_banjar_adat = 'tidak aktif';
        $updateprajurubanjar->save();
        // dd($updateprajurudesa);

        return redirect()->route('prajuru-banjar-adat')->with('success', 'Data berhasil dinonaktifkan!');
    }

    public function detail($id)
    {
        $detailprajurubanjar = PrajuruBanjarAdat::with(['banjaradat','kramamipil'])->findOrFail($id);

        return view('admin.masterdata.banjar.detail-prajuru-banjar', compact('detailprajurubanjar'));
    }

    public function destroy($id)
    {
        //
    }
}
