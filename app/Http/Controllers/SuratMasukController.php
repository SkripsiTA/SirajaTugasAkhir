<?php

namespace App\Http\Controllers;

use App\Models\NomorSurat;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DateTime;
use Illuminate\Support\Facades\File;

class SuratMasukController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $suratmasuk = SuratMasuk::with(['nomorsurat', 'desaadat', 'prajurudesaadat'])->where('desa_adat_id', Auth::user()->desa_adat_id)->paginate(10);

        return view('admin.suratmasuk.surat-masuk', compact('suratmasuk'));
    }

    public function list()
    {
        $suratmasuk = SuratMasuk::with(['nomorsurat', 'desaadat', 'prajurudesaadat'])->where('desa_adat_id', Auth::user()->desa_adat_id)->get();

        // dd($suratmasuk);
        return view('admin.suratmasuk.cetak-daftar-surat-masuk', compact('suratmasuk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nomorsurat = NomorSurat::with('desaadat')->where('desa_adat_id', Auth::user()->desa_adat_id)->get();

        return view('admin.suratmasuk.add-surat-masuk', compact('nomorsurat'));
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

        $suratmasuk = new SuratMasuk;

        if($request->hasFile('file_surat')) {
            $struktur = $request->file('file_surat');
            $filename = time().'.'.$struktur->getClientOriginalExtension();
            $struktur->move('assets/file/surat-masuk', $filename);

            $suratmasuk->master_surat_id = $request->master_surat;
            $suratmasuk->desa_adat_id = Auth::user()->desa_adat_id;
            $suratmasuk->nomor_surat = $request->nomor_surat_masuk;
            $suratmasuk->asal_surat = $request->mawit_saking;
            $suratmasuk->perihal = $request->parindikan;
            $suratmasuk->tanggal_kegiatan_mulai = $request->tanggal_kegiatan_mulai;
            $suratmasuk->tanggal_kegiatan_berakhir = $request->tanggal_kegiatan_berakhir;
            $suratmasuk->waktu_kegiatan_mulai = $request->waktu_kegiatan_mulai;
            $suratmasuk->waktu_kegiatan_selesai = $request->waktu_kegiatan_berakhir;
            $suratmasuk->file = $filename;
            $suratmasuk->prajuru_desa_adat_id = Auth::user()->desaadat->prajurudesaadat[0]->prajuru_desa_adat_id;
            $suratmasuk->tanggal_diterima = new DateTime('now');
            $suratmasuk->tanggal_surat = $request->tanggal_surat;
            // dd($suratmasuk->tanggal_diterima);
        }
        $suratmasuk->save();

        return redirect()->route('dashboard-surat-masuk')->with(['success' => 'Data surat berhasil ditambahkan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $suratmasuk = SuratMasuk::with(['nomorsurat', 'desaadat', 'prajurudesaadat'])->findOrFail($id);

        return view('admin.suratmasuk.detail-surat-masuk', compact('suratmasuk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $suratmasuk = SuratMasuk::with(['nomorsurat', 'desaadat', 'prajurudesaadat'])->findOrFail($id);
        $nomorsurat = NomorSurat::with('desaadat')->where('desa_adat_id', Auth::user()->desa_adat_id)->get();

        return view('admin.suratmasuk.edit-surat-masuk', compact('suratmasuk', 'nomorsurat'));
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
        // dd($request->all());

        $suratmasuk = SuratMasuk::with(['nomorsurat', 'desaadat', 'prajurudesaadat'])->findOrFail($id);

        if($request->hasFile('file_surat')) {
            $struktur = $request->file('file_surat');
            $filename = time().'.'.$struktur->getClientOriginalExtension();
            $struktur->move('assets/file/surat-masuk', $filename);

            File::delete('assets/file/surat-masuk'. $suratmasuk->file);

            $suratmasuk->master_surat_id = $request->master_surat;
            $suratmasuk->desa_adat_id = Auth::user()->desa_adat_id;
            $suratmasuk->nomor_surat = $request->nomor_surat_masuk;
            $suratmasuk->asal_surat = $request->mawit_saking;
            $suratmasuk->perihal = $request->parindikan;
            $suratmasuk->tanggal_kegiatan_mulai = $request->tanggal_kegiatan_mulai;
            $suratmasuk->tanggal_kegiatan_berakhir = $request->tanggal_kegiatan_berakhir;
            $suratmasuk->waktu_kegiatan_mulai = $request->waktu_kegiatan_mulai;
            $suratmasuk->waktu_kegiatan_selesai = $request->waktu_kegiatan_berakhir;
            $suratmasuk->file = $filename;
            $suratmasuk->prajuru_desa_adat_id = Auth::user()->desaadat->prajurudesaadat[0]->prajuru_desa_adat_id;
            $suratmasuk->tanggal_diterima = new DateTime('now');
            $suratmasuk->tanggal_surat = $request->tanggal_surat;
            // dd($suratmasuk->tanggal_diterima);
        } else {

            $suratmasuk->master_surat_id = $request->master_surat;
            $suratmasuk->desa_adat_id = Auth::user()->desa_adat_id;
            $suratmasuk->nomor_surat = $request->nomor_surat_masuk;
            $suratmasuk->asal_surat = $request->mawit_saking;
            $suratmasuk->perihal = $request->parindikan;
            $suratmasuk->tanggal_kegiatan_mulai = $request->tanggal_kegiatan_mulai;
            $suratmasuk->tanggal_kegiatan_berakhir = $request->tanggal_kegiatan_berakhir;
            $suratmasuk->waktu_kegiatan_mulai = $request->waktu_kegiatan_mulai;
            $suratmasuk->waktu_kegiatan_selesai = $request->waktu_kegiatan_berakhir;
            $suratmasuk->prajuru_desa_adat_id = Auth::user()->desaadat->prajurudesaadat[0]->prajuru_desa_adat_id;
            $suratmasuk->tanggal_diterima = new DateTime('now');
            $suratmasuk->tanggal_surat = $request->tanggal_surat;
        }
        $suratmasuk->save();

        return redirect()->route('dashboard-surat-masuk')->with(['success' => 'Data surat berhasil diupdate!']);
    }

    public function showfile($id)
    {
        $suratmasuk = SuratMasuk::with(['nomorsurat', 'desaadat', 'prajurudesaadat'])->findOrFail($id);

        return view('admin.suratmasuk.file-surat-masuk', compact('suratmasuk'));
    }

    public function destroy($id)
    {
        $suratmasuk = SuratMasuk::with(['nomorsurat', 'desaadat', 'prajurudesaadat'])->findOrFail($id);
        $suratmasuk->delete();

        return redirect()->route('dashboard-surat-masuk');
    }
}
