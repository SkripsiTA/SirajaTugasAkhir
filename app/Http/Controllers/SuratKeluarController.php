<?php

namespace App\Http\Controllers;

use App\Models\KramaMipil;
use App\Models\NomorSurat;
use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use App\Models\PrajuruDesaAdat;
use Illuminate\Support\Facades\DB;
use App\Models\ValidasiPrajuruDesa;
use Illuminate\Support\Facades\Auth;

class SuratKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suratkeluarwaiting = SuratKeluar::with(['nomorsurat', 'desaadat'])->where('status', 'Menunggu Respon')->where('tim_kegiatan', null)->paginate(10);
        $suratkeluarinprogress = SuratKeluar::with(['nomorsurat', 'desaadat'])->where('status', 'Sedang Diproses')->where('tim_kegiatan', null)->paginate(10);
        $suratkeluarverified = SuratKeluar::with(['nomorsurat', 'desaadat'])->where('status', 'Telah Dikonfirmasi')->where('tim_kegiatan', null)->paginate(10);
        $suratkeluarrejected = SuratKeluar::with(['nomorsurat', 'desaadat'])->where('status', 'Dibatalkan')->where('tim_kegiatan', null)->paginate(10);
        return view('admin.suratkeluar.suratNonPanitia.home-surat-non-panitia', compact('suratkeluarwaiting', 'suratkeluarinprogress', 'suratkeluarverified', 'suratkeluarrejected'));
    }

    public function list()
    {
        $suratkeluar = SuratKeluar::with(['nomorsurat', 'desaadat'])->where('desa_adat_id', Auth::user()->desa_adat_id)->where('tim_kegiatan', null)->get();

        // dd($suratmasuk);
        return view('admin.suratkeluar.suratNonPanitia.cetak-daftar-surat-keluar-non-panitia', compact('suratkeluar'));
    }

    public function create()
    {
        $nomorsurat = NomorSurat::with('desaadat')->where('desa_adat_id', Auth::user()->desa_adat_id)->get();
        $kramamipil = KramaMipil::with(['banjaradat', 'cacahkramamipil'])->get();
        $prajurudesa = PrajuruDesaAdat::with(['desaadat','kramamipil'])->where('desa_adat_id', Auth::user()->desa_adat_id)->get();

        $bulanromawi = array("", "I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
        $nomor_surat = SuratKeluar::max('surat_keluar_id');
        // $nomor_surat = NomorSurat::with('suratkeluar')->get();
        $desa = SuratKeluar::with(['nomorsurat', 'desaadat'])->where('desa_adat_id', Auth::user()->desa_adat_id)->get();
        $nomor = 1;
        $kode_surat = NomorSurat::where('master_surat_id', '1')->get();

        $data = [
            'last_id' => sprintf("%03s", abs($nomor_surat + 1)),
            'kode_surat' => $kode_surat[0]->kode_nomor_surat,
            'kode_desa' => $desa[0]->desaadat->desadat_kode_surat,
            'bulan' => $bulanromawi[date('n')],
            'tahun' => date('Y'),
        ];
        $kode_surat = json_encode($data);

        // if($nomor_surat) {
        //     $kode_otomatis = sprintf("%03s", abs($nomor_surat + 1)).'/'.$kode_surat[0]->kode_nomor_surat.'-'.$desa[0]->desaadat->desadat_kode_surat.'/'.$bulanromawi[date('n')].'/'.date('Y');
        // }else{
        //     $kode_otomatis = sprintf("%03s", $nomor).'/'.$kode_surat[0]->kode_nomor_surat.'-'.$desa[0]->desaadat->desadat_kode_surat.'/'.$bulanromawi[date('n')].'/'.date('Y');
        // }


        // dd($prajurudesa);

        return view('admin.suratkeluar.suratNonPanitia.add-surat-non-panitia', compact('kramamipil', 'prajurudesa', 'kode_surat', 'nomorsurat'));
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
        $suratkeluar = new SuratKeluar;

        // $suratkeluar->tanggal_kegiatan = json_encode([$request->waktu_mulai, $request->waktu_berakhir]);
        // dd($suratkeluar->tanggal_kegiatan);

        if($request->hasFile('lepihan_surat')) {
            $struktur = $request->file('lepihan_surat');
            $filename = time().'.'.$struktur->getClientOriginalExtension();
            $struktur->move('assets/file/lampiran/surat-keluar', $filename);

            $suratkeluar->master_surat_id = $request->master_surat;
            $suratkeluar->desa_adat_id = Auth::user()->desa_adat_id;
            $suratkeluar->nomor_surat = $request->nomor_surat_keluar;
            $suratkeluar->lepihan = $request->lepihan;
            $suratkeluar->parindikan = $request->parindikan;
            $suratkeluar->pamahbah_surat = $request->pemahbah_surat;
            $suratkeluar->daging_surat = $request->daging_surat;
            $suratkeluar->pamuput_surat = $request->pamuput_surat;
            $suratkeluar->tanggal_kegiatan_mulai = $request->tanggal_kegiatan_mulai;
            $suratkeluar->tanggal_kegiatan_berakhir = $request->tanggal_kegiatan_berakhir;
            $suratkeluar->busana = $request->busana;
            $suratkeluar->tempat_kegiatan = $request->tempat_kegiatan;
            $suratkeluar->waktu_kegiatan_mulai = $request->waktu_kegiatan_mulai;
            $suratkeluar->waktu_kegiatan_selesai = $request->waktu_kegiatan_berakhir;
            $suratkeluar->lampiran = $filename;
            $suratkeluar->status = 'Menunggu Respon';
            $suratkeluar->pihak_penerima = $request->tetujon;
            $suratkeluar->tumusan = $request->tumusan;

        } else {
            $suratkeluar->master_surat_id = $request->master_surat;
            $suratkeluar->desa_adat_id = Auth::user()->desa_adat_id;
            $suratkeluar->nomor_surat = $request->nomor_surat_keluar;
            $suratkeluar->lepihan = $request->lepihan;
            $suratkeluar->parindikan = $request->parindikan;
            $suratkeluar->pamahbah_surat = $request->pemahbah_surat;
            $suratkeluar->daging_surat = $request->daging_surat;
            $suratkeluar->pamuput_surat = $request->pamuput_surat;
            $suratkeluar->tanggal_kegiatan_mulai = $request->tanggal_kegiatan_mulai;
            $suratkeluar->tanggal_kegiatan_berakhir = $request->tanggal_kegiatan_berakhir;
            $suratkeluar->busana = $request->busana;
            $suratkeluar->tempat_kegiatan = $request->tempat_kegiatan;
            $suratkeluar->waktu_kegiatan_mulai = $request->waktu_kegiatan_mulai;
            $suratkeluar->waktu_kegiatan_selesai = $request->waktu_kegiatan_berakhir;
            $suratkeluar->status = 'Menunggu Respon';
            $suratkeluar->pihak_penerima = $request->tetujon;
            $suratkeluar->tumusan = $request->tumusan;

        }
        $suratkeluar->save();

        $last_surat_keluar_id = $suratkeluar->surat_keluar_id;
        $prajurudesaval = array($request->penyarikan_adat, $request->bendesa_adat);
        for($i = 0; $i < 2; $i++) {
            $validasiprajurudesa = new ValidasiPrajuruDesa();
            $validasiprajurudesa->prajuru_desa_adat_id = $prajurudesaval[$i];
            $validasiprajurudesa->surat_keluar_id = $last_surat_keluar_id;
            $validasiprajurudesa->save();
        }

        // dd($prajurudesaval);

        return redirect()->route('home-surat-keluar-non-panitia')->with(['success' => 'Data surat sedang diproses!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $suratkeluarnonpanitia = SuratKeluar::with(['nomorsurat','desaadat', 'validasiprajurudesa'])->findOrFail($id);

        return view('admin.suratkeluar.suratNonPanitia.detail-surat-non-panitia', compact('suratkeluarnonpanitia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $suratkeluarnonpanitia = SuratKeluar::with(['nomorsurat','desaadat', 'validasiprajurudesa'])->findOrFail($id);
        $nomorsurat = NomorSurat::with('desaadat')->where('desa_adat_id', Auth::user()->desa_adat_id)->get();
        $prajurudesa = PrajuruDesaAdat::with(['desaadat','kramamipil'])->where('desa_adat_id', Auth::user()->desa_adat_id)->get();

        return view('admin.suratkeluar.suratNonPanitia.edit-surat-non-panitia', compact('suratkeluarnonpanitia', 'nomorsurat', 'prajurudesa'));
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
        $suratkeluar = SuratKeluar::with(['nomorsurat','desaadat', 'validasiprajurudesa'])->findOrFail($id);

        // $suratkeluar->tanggal_kegiatan = json_encode([$request->waktu_mulai, $request->waktu_berakhir]);
        // dd($suratkeluar->tanggal_kegiatan);

        if($request->hasFile('lepihan_surat')) {
            $struktur = $request->file('lepihan_surat');
            $filename = time().'.'.$struktur->getClientOriginalExtension();
            $struktur->move('assets/file/lampiran/surat-keluar', $filename);

            $suratkeluar->master_surat_id = $request->master_surat;
            $suratkeluar->desa_adat_id = Auth::user()->desa_adat_id;
            $suratkeluar->nomor_surat = $request->nomor_surat_keluar;
            $suratkeluar->lepihan = $request->lepihan;
            $suratkeluar->parindikan = $request->parindikan;
            $suratkeluar->pamahbah_surat = $request->pemahbah_surat;
            $suratkeluar->daging_surat = $request->daging_surat;
            $suratkeluar->pamuput_surat = $request->pamuput_surat;
            $suratkeluar->tanggal_kegiatan_mulai = $request->tanggal_kegiatan_mulai;
            $suratkeluar->tanggal_kegiatan_berakhir = $request->tanggal_kegiatan_berakhir;
            $suratkeluar->busana = $request->busana;
            $suratkeluar->tempat_kegiatan = $request->tempat_kegiatan;
            $suratkeluar->waktu_kegiatan_mulai = $request->waktu_kegiatan_mulai;
            $suratkeluar->waktu_kegiatan_selesai = $request->waktu_kegiatan_berakhir;
            $suratkeluar->lampiran = $filename;
            $suratkeluar->status = 'Menunggu Respon';
            $suratkeluar->pihak_penerima = $request->tetujon;
            $suratkeluar->tumusan = $request->tumusan;

        } else {
            $suratkeluar->master_surat_id = $request->master_surat;
            $suratkeluar->desa_adat_id = Auth::user()->desa_adat_id;
            $suratkeluar->nomor_surat = $request->nomor_surat_keluar;
            $suratkeluar->lepihan = $request->lepihan;
            $suratkeluar->parindikan = $request->parindikan;
            $suratkeluar->pamahbah_surat = $request->pemahbah_surat;
            $suratkeluar->daging_surat = $request->daging_surat;
            $suratkeluar->pamuput_surat = $request->pamuput_surat;
            $suratkeluar->tanggal_kegiatan_mulai = $request->tanggal_kegiatan_mulai;
            $suratkeluar->tanggal_kegiatan_berakhir = $request->tanggal_kegiatan_berakhir;
            $suratkeluar->busana = $request->busana;
            $suratkeluar->tempat_kegiatan = $request->tempat_kegiatan;
            $suratkeluar->waktu_kegiatan_mulai = $request->waktu_kegiatan_mulai;
            $suratkeluar->waktu_kegiatan_selesai = $request->waktu_kegiatan_berakhir;
            $suratkeluar->status = 'Menunggu Respon';
            $suratkeluar->pihak_penerima = $request->tetujon;
            $suratkeluar->tumusan = $request->tumusan;

        }
        $suratkeluar->save();

        $last_surat_keluar_id = $suratkeluar->surat_keluar_id;
        $prajurudesaval = array($request->penyarikan_adat, $request->bendesa_adat);

        for($i = 0; $i < 2; $i++) {
            $validasiprajurudesa = ValidasiPrajuruDesa::with(['suratkeluar', 'prajurudesaadat'])->findOrFail($last_surat_keluar_id);
            $validasiprajurudesa->prajuru_desa_adat_id = $prajurudesaval[$i];
            $validasiprajurudesa->surat_keluar_id = $last_surat_keluar_id;
            $validasiprajurudesa->save();
        }
        // dd($validasiprajurudesa);
        return redirect()->route('home-surat-keluar-non-panitia')->with(['success' => 'Data surat sedang diproses!']);
    }

    public function cetak($id)
    {
    	$suratkeluarnonpanitia = SuratKeluar::with(['nomorsurat','desaadat', 'validasiprajurudesa'])->findOrFail($id);

    	// $pdf = PDF::loadview('admin.suratkeluar.suratPanitia.detail-surat-panitia',['suratkeluarpanitia'=>$suratkeluarpanitia]);
    	// return $pdf->download('admin.suratkeluar.suratPanitia.surat-keluar-panitia-pdf');
        return view('admin.suratkeluar.suratNonPanitia.surat-keluar-non-panitia-pdf', compact('suratkeluarnonpanitia'));
    }

    public function showlepihan($id)
    {
        $suratkeluarnonpanitia = SuratKeluar::with(['nomorsurat','desaadat', 'validasiprajurudesa'])->findOrFail($id);

        return view('admin.suratkeluar.suratNonPanitia.lampiran-surat-non-panitia', compact('suratkeluarnonpanitia'));
    }

    public function inprogress(Request $request, $id)
    {
        $suratkeluarnonpanitia = SuratKeluar::with(['nomorsurat','desaadat', 'validasiprajurudesa'])->findOrFail($id);
        $suratkeluarnonpanitia->status = 'Sedang Diproses';
        $suratkeluarnonpanitia->save();

        return redirect()->route('detail-surat-keluar-non-panitia-inprogress', $suratkeluarnonpanitia->surat_keluar_id);
    }
    public function showinprogress($id)
    {
        $suratkeluarnonpanitia = SuratKeluar::with(['nomorsurat','desaadat', 'validasiprajurudesa'])->findOrFail($id);

        return view('admin.suratkeluar.suratNonPanitia.detail-surat-non-panitia-inprogress', compact('suratkeluarnonpanitia'));
    }
}
