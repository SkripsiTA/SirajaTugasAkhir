<?php

namespace App\Http\Controllers;

use App\Models\KramaMipil;
use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use App\Models\PrajuruDesaAdat;
use Illuminate\Support\Facades\Auth;

class SuratKeluarPanitiaController extends Controller
{
    public function index()
    {
        $suratkeluarwaiting = SuratKeluar::with(['nomorsurat', 'desaadat'])->where('status', 'Menunggu Respon')->paginate(10);
        $suratkeluarinprogress = SuratKeluar::with(['nomorsurat', 'desaadat'])->where('status', 'Sedang Diproses')->paginate(10);
        $suratkeluarverified = SuratKeluar::with(['nomorsurat', 'desaadat'])->where('status', 'Telah Dikonfirmasi')->paginate(10);
        $suratkeluarrejected = SuratKeluar::with(['nomorsurat', 'desaadat'])->where('status', 'Dibatalkan')->paginate(10);
        return view('admin.suratkeluar.suratPanitia.home-surat-panitia', compact('suratkeluarwaiting', 'suratkeluarinprogress', 'suratkeluarverified', 'suratkeluarrejected'));
    }

    public function create()
    {
        $kramamipil = KramaMipil::with(['banjaradat', 'cacahkramamipil'])->get();
        $prajurudesa = PrajuruDesaAdat::with(['desaadat','kramamipil'])->where('desa_adat_id', Auth::user()->desa_adat_id)->get();

        return view('admin.suratkeluar.suratPanitia.add-surat-panitia', compact('kramamipil', 'prajurudesa'));
    }

    public function store(Request $request)
    {
        dd($request->all());
        $suratkeluar = new SuratKeluar;
        $suratkeluar->desa_adat_id = Auth::user()->desa_adat_id;
        $suratkeluar->tanggal_keluar = $request->nama_jabatan;
        $suratkeluar->status_prajuru_desa_adat = $request->status_prajuru_desa;
        $suratkeluar->tanggal_mulai_menjabat = $request->masa_mulai;
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

        return redirect()->route('home-surat-keluar-panitia')->with(['success' => 'Data surat sedang diproses!']);
    }

    public function show($id)
    {
        $suratkeluarpanitia = SuratKeluar::with(['nomorsurat','desaadat', 'detailsuratkeluarpanitia'])->findOrFail($id);

        return view('admin.suratkeluar.suratPanitia.detail-surat-panitia', compact('suratkeluarpanitia'));
    }
}

