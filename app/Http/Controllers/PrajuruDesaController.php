<?php

namespace App\Http\Controllers;

use App\Models\KramaMipil;
use Illuminate\Http\Request;
use App\Models\PrajuruDesaAdat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class PrajuruDesaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $prajurudesa = PrajuruDesaAdat::with(['desaadat','kramamipil'])->where('desa_adat_id', Auth::user()->desa_adat_id)->paginate(10);

        return view('admin.masterdata.pegawai.prajuru-desa', compact('prajurudesa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prajurudesa = PrajuruDesaAdat::first();
        $kramamipil = KramaMipil::with(['banjaradat', 'cacahkramamipil'])->get();
        $akun = User::with(['penduduk','desaadat'])->first();

        return view('admin.masterdata.pegawai.add-prajuru-desa', compact('prajurudesa','kramamipil', 'akun'));
    }

    public function getpassword(Request $request)
    {
        $kramamipil_id = $request->kramamipil_id;

        $nik = KramaMipil::with(['banjaradat', 'cacahkramamipil'])->where('krama_mipil_id',$kramamipil_id)->get();
        $pass = $nik->cacahkramamipil->penduduk->nik;
        $encrypt = Hash::make($pass);

        return response()->json($encrypt);

    }

    public function store(Request $request)
    {
        // dd($request->all());
        $prajurudesa = new PrajuruDesaAdat;
        $prajurudesa->desa_adat_id = Auth::user()->desa_adat_id;
        $prajurudesa->krama_mipil_id = $request->kramamipil_id;
        $prajurudesa->jabatan = $request->nama_jabatan;
        $prajurudesa->status_prajuru_desa_adat = $request->status_prajuru_desa;
        $prajurudesa->tanggal_mulai_menjabat = $request->masa_mulai;
        $prajurudesa->tanggal_akhir_menjabat = $request->masa_berakhir;
        $prajurudesa->save();

        // dd($prajurudesaakun);
        $prajurudesaakun = new User;
        $prajurudesaakun->desa_adat_id = Auth::user()->desa_adat_id;
        $pendudukid = KramaMipil::with('cacahkramamipil.penduduk')->findOrFail($request->kramamipil_id);
        $prajurudesaakun->penduduk_id = $pendudukid->cacahkramamipil->penduduk->penduduk_id;
        $prajurudesaakun->email = $request->email;
        $prajurudesaakun->password = Hash::make($request->password);
        $prajurudesaakun->role = $request->role_prajuru;
        $prajurudesaakun->save();

        return redirect('/prajuru/desaadat')->with('success', 'Data berhasil ditambahkan!');
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
        $editprajurudesa = PrajuruDesaAdat::with(['desaadat','kramamipil'])->findOrFail($id);

        return view('admin.masterdata.pegawai.edit-prajuru-desa', compact('editprajurudesa'));
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

        $updateprajurudesa = PrajuruDesaAdat::with(['desaadat','kramamipil'])->findOrFail($id);
        $updateprajurudesa->desa_adat_id = Auth::user()->desa_adat_id;
        $updateprajurudesa->krama_mipil_id = $request->kramamipil_id;
        $updateprajurudesa->jabatan = $request->nama_jabatan;
        $updateprajurudesa->status_prajuru_desa_adat = $request->status_prajuru_desa;
        // dd($request->status_prajuru_desa);
        $updateprajurudesa->tanggal_mulai_menjabat = $request->masa_mulai;
        $updateprajurudesa->tanggal_akhir_menjabat = $request->masa_berakhir;
        $updateprajurudesa->save();

        $updateprajurudesaakun = User::findOrFail($updateprajurudesa->desaadat->user[0]->user_id);
        $updateprajurudesaakun->desa_adat_id = Auth::user()->desa_adat_id;
        $pendudukid = KramaMipil::with('cacahkramamipil.penduduk')->findOrFail($request->kramamipil_id);
        $updateprajurudesaakun->penduduk_id = $pendudukid->cacahkramamipil->penduduk->penduduk_id;
        $updateprajurudesaakun->email = $request->email;
        $updateprajurudesaakun->role = $request->role_prajuru;
        $updateprajurudesaakun->save();

        // return dd([$updateprajurudesa, $updateprajurudesaakun]);
        return redirect('/prajuru/desaadat')->with('success', 'Data berhasil diupdate!');

    }

    public function nonaktif(Request $request, $id)
    {
        $updateprajurudesa = PrajuruDesaAdat::with(['desaadat','kramamipil'])->findOrFail($id);
        $updateprajurudesa->status_prajuru_desa_adat = 'tidak aktif';
        $updateprajurudesa->save();
        // dd($updateprajurudesa);

        return redirect('/prajuru/desaadat')->with('success', 'Data berhasil dinonaktifkan!');
    }

    public function aktif(Request $request, $id)
    {
        $updateprajurudesa = PrajuruDesaAdat::with(['desaadat','kramamipil'])->findOrFail($id);
        $updateprajurudesa->status_prajuru_desa_adat = 'aktif';
        $updateprajurudesa->save();
        // dd($updateprajurudesa);

        return redirect('/prajuru/desaadat')->with('success', 'Data berhasil diaktifkan!');
    }

    public function detail($id)
    {
        $detailprajurudesa = PrajuruDesaAdat::with(['desaadat','kramamipil'])->findOrFail($id);

        return view('admin.masterdata.pegawai.detail-prajuru-desa', compact('detailprajurudesa'));
    }
    public function destroy($id)
    {
        // $prajurudesa = PrajuruDesaAdat::findOrFail($id);
        // $prajurudesa->delete();
        // $delete = PrajuruDesaAdat::with('kramamipil.cacahkramamipil.penduduk.user')->where('prajuru_desa_adat_id', $id)->delete();
        // User::delete($id);
        // dd($delete);
        return redirect('/prajuru/desaadat')->with('success', 'Data berhasil dihapus!');
    }
}
