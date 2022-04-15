<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\PDF;
use App\Models\KramaMipil;
use App\Models\NomorSurat;
use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use App\Models\PrajuruDesaAdat;
use App\Models\ValidasiPanitia;
use App\Models\ValidasiPrajuruDesa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

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
        $nomorsurat = NomorSurat::with('desaadat')->where('desa_adat_id', Auth::user()->desa_adat_id)->get();
        $kramamipil = KramaMipil::with(['banjaradat', 'cacahkramamipil'])->get();
        $prajurudesa = PrajuruDesaAdat::with(['desaadat','kramamipil'])->where('desa_adat_id', Auth::user()->desa_adat_id)->get();

        $bulanromawi = array("", "I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
        $nomor_surat = SuratKeluar::max('surat_keluar_id');
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

        // dd($kode_otomatis);

        return view('admin.suratkeluar.suratPanitia.add-surat-panitia', compact('kramamipil', 'prajurudesa', 'kode_surat', 'nomorsurat'));
    }

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
            $suratkeluar->tim_kegiatan = $request->tim_kegiatan;
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
            $suratkeluar->tim_kegiatan = $request->tim_kegiatan;
            $suratkeluar->status = 'Menunggu Respon';
            $suratkeluar->pihak_penerima = $request->tetujon;
            $suratkeluar->tumusan = $request->tumusan;

        }
        $suratkeluar->save();

        $last_surat_keluar_id = $suratkeluar->surat_keluar_id;
        $panitia = array($request->sekretaris_panitia, $request->ketua_panitia);
        $jabatan = array('Sekretaris Panitia', 'Ketua Panitia');
        for($i = 0; $i < 2; $i++) {
            $validasipanitia = new ValidasiPanitia;
            $validasipanitia->krama_mipil_id = $panitia[$i];
            $validasipanitia->jabatan = $jabatan[$i];
            $validasipanitia->surat_keluar_id = $last_surat_keluar_id;
            $validasipanitia->save();
        }

        // dd($validasipanitia);

        $validasiprajurudesa = new ValidasiPrajuruDesa();
        $validasiprajurudesa->surat_keluar_id = $suratkeluar->surat_keluar_id;
        $validasiprajurudesa->prajuru_desa_adat_id = $request->bendesa_adat;
        $validasiprajurudesa->save();

        return redirect()->route('home-surat-keluar-panitia')->with(['success' => 'Data surat sedang diproses!']);
    }

    public function show($id)
    {
        $suratkeluarpanitia = SuratKeluar::with(['nomorsurat','desaadat', 'validasipanitia', 'validasiprajurudesa'])->findOrFail($id);

        return view('admin.suratkeluar.suratPanitia.detail-surat-panitia', compact('suratkeluarpanitia'));
    }

    public function edit($id)
    {
        $suratkeluarpanitia = SuratKeluar::with(['nomorsurat','desaadat', 'validasipanitia', 'validasiprajurudesa'])->findOrFail($id);
        $nomorsurat = NomorSurat::with('desaadat')->where('desa_adat_id', Auth::user()->desa_adat_id)->get();
        $kramamipil = KramaMipil::with(['banjaradat', 'cacahkramamipil'])->get();
        $prajurudesa = PrajuruDesaAdat::with(['desaadat','kramamipil'])->where('desa_adat_id', Auth::user()->desa_adat_id)->get();

        return view('admin.suratkeluar.suratPanitia.edit-surat-panitia', compact('suratkeluarpanitia', 'nomorsurat', 'kramamipil', 'prajurudesa'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $suratkeluar = SuratKeluar::with(['nomorsurat','desaadat', 'validasipanitia', 'validasiprajurudesa'])->findOrFail($id);
        
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
            $suratkeluar->tim_kegiatan = $request->tim_kegiatan;
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
            $suratkeluar->tim_kegiatan = $request->tim_kegiatan;
            $suratkeluar->status = 'Menunggu Respon';
            $suratkeluar->pihak_penerima = $request->tetujon;
            $suratkeluar->tumusan = $request->tumusan;

        }
        $suratkeluar->save();

        $last_surat_keluar_id = $suratkeluar->surat_keluar_id;
        $panitia = array($request->sekretaris_panitia, $request->ketua_panitia);
        $jabatan = array('Sekretaris Panitia', 'Ketua Panitia');
        for($i = 0; $i < 2; $i++) {
            $validasipanitia = ValidasiPanitia::with(['suratkeluar','kramamipil'])->findOrFail($last_surat_keluar_id);
            // dd($validasipanitia);
            $validasipanitia->krama_mipil_id = $panitia[$i];
            $validasipanitia->jabatan = $jabatan[$i];
            $validasipanitia->surat_keluar_id = $last_surat_keluar_id;
            $validasipanitia->save();
        }

        // dd($validasipanitia);

        $validasiprajurudesa = ValidasiPrajuruDesa::with(['suratkeluar', 'prajurudesaadat'])->findOrFail($suratkeluar->validasiprajurudesa[0]->validasi_prajuru_desa_id);
        // dd($suratkeluar->validasiprajurudesa[0]->validasi_prajuru_desa_id);
        $validasiprajurudesa->surat_keluar_id = $suratkeluar->surat_keluar_id;
        $validasiprajurudesa->prajuru_desa_adat_id = $request->bendesa_adat;
        $validasiprajurudesa->save();

        return redirect()->route('home-surat-keluar-panitia')->with(['success' => 'Data surat sedang diproses!']);
    }

    public function cetak($id)
    {
    	$suratkeluarpanitia = SuratKeluar::with(['nomorsurat','desaadat', 'validasipanitia', 'validasiprajurudesa'])->findOrFail($id);

    	// $pdf = PDF::loadview('admin.suratkeluar.suratPanitia.detail-surat-panitia',['suratkeluarpanitia'=>$suratkeluarpanitia]);
    	// return $pdf->download('admin.suratkeluar.suratPanitia.surat-keluar-panitia-pdf');
        return view('admin.suratkeluar.suratPanitia.surat-keluar-panitia-pdf', compact('suratkeluarpanitia'));
    }

    public function showlepihan($id)
    {
        $suratkeluarpanitia = SuratKeluar::with(['nomorsurat','desaadat', 'validasipanitia', 'validasiprajurudesa'])->findOrFail($id);

        return view('admin.suratkeluar.suratPanitia.lampiran-surat-panitia', compact('suratkeluarpanitia'));
    }

    public function inprogress(Request $request, $id)
    {
        $suratkeluarpanitia = SuratKeluar::with(['nomorsurat','desaadat', 'validasipanitia', 'validasiprajurudesa'])->findOrFail($id);
        $suratkeluarpanitia->status = 'Sedang Diproses';
        $suratkeluarpanitia->save();

        return redirect()->route('detail-surat-keluar-panitia-inprogress', $suratkeluarpanitia->surat_keluar_id);
    }

    public function showinprogress($id)
    {
        $suratkeluarpanitia = SuratKeluar::with(['nomorsurat','desaadat', 'validasipanitia', 'validasiprajurudesa'])->findOrFail($id);

        return view('admin.suratkeluar.suratPanitia.detail-surat-panitia-inprogress', compact('suratkeluarpanitia'));
    }
}

