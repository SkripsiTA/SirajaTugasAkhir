<?php

namespace App\Http\Controllers\API\Data;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SuratKeluar;
use App\Models\SuratMasuk;
use App\Models\DesaAdat;
use App\Models\MasterSurat;
use App\Models\ValidasiPanitia;
use App\Models\Penduduk;
use App\Models\ValidasiPrajuruDesa;
use Carbon\Carbon;
use App\Models\PrajuruDesaAdat;
use PDF;
use Illuminate\Support\Facades\DB;

class DataSuratController extends Controller
{
    public function __construct() {
        $this->SuratMasuk = new SuratMasuk();
        $this->SuratKeluar = new SuratKeluar();
        $this->DesaAdat = new DesaAdat();
        $this->MasterSurat = new MasterSurat();
        $this->ValidasiPanitia = new ValidasiPanitia();
        $this->Penduduk = new Penduduk();
        $this->ValidasiPrajuruDesa = new ValidasiPrajuruDesa();
        $this->PrajuruDesaAdat = new PrajuruDesaAdat();
    }

    public function show_surat_keluar_panitia($id) {
        Request()->validate([
            'status' => 'required'
        ]);
        $data_cek = SuratKeluar::join('tb_master_surat', 'tb_surat_keluar.master_surat_id', '=', 'tb_master_surat.master_surat_id')
                                ->where('tb_master_surat.keterangan', 'like', '%Panitia%')
                                ->where('tb_surat_keluar.desa_adat_id', $id)
                                ->where('tb_surat_keluar.status', Request()->status)
                                ->first();

        $data = SuratKeluar::join('tb_master_surat', 'tb_surat_keluar.master_surat_id', '=', 'tb_master_surat.master_surat_id')
                            ->where('tb_master_surat.keterangan', 'like', '%Panitia%')
                            ->where('tb_surat_keluar.desa_adat_id', $id)
                            ->where('tb_surat_keluar.status', Request()->status)
                            ->get();
        if($data_cek == null) {
            return response()->json([
                'status' => 'Failed',
                'message' => 'Data Surat Keluar Tidak Ditemukan!'
            ], 500);
        }else{
            return response()->json($data, 200);
        }
    }

    public function show_detail_surat_keluar($id) {
        $data = SuratKeluar::where('surat_keluar_id', $id)->first();
        return response()->json($data, 200);
    }

    public function show_surat_keluar($id) {
        $data = SuratKeluar::join('tb_m_desa_adat', 'tb_surat_keluar.desa_adat_id', '=', 'tb_m_desa_adat.desa_adat_id')
                            ->join('tb_m_kecamatan', 'tb_m_desa_adat.kecamatan_id', '=', 'tb_m_kecamatan.kecamatan_id')
                            ->join('tb_m_kabupaten', 'tb_m_kecamatan.kabupaten_id', '=', 'tb_m_kabupaten.kabupaten_id')
                            ->where('tb_surat_keluar.surat_keluar_id', $id)
                            ->first();
        return response()->json($data, 200);
    }

    public function show_nomor_surat_data($id) {
        $kode_desa = DesaAdat::select('desadat_kode_surat')->where('desa_adat_id', $id)->first();
        $bulan_romawi = array("", "I", "II", "III", "IV", "V", "VII", "VIII", "IX", "X", "XI", "XII");
        $nomor_surat_id = SuratKeluar::max('surat_keluar_id');
        $nomor = 1;
        $kode_surat = json_decode($kode_desa);
        if($nomor_surat_id) {
            $nomor_surat = sprintf("%03s", abs($nomor_surat_id + 1));
        }else{
            $nomor_surat = sprintf("%03s", $nomor);
        }
        $data = [
            'nomor_urut_surat' => $nomor_surat,
            'kode_desa' => $kode_surat->desadat_kode_surat,
            'bulan' => $bulan_romawi[date('n')],
            'tahun' => date('Y')
        ];
        return response()->json($data, 200);
    }

    public function show_kode_surat_non_panitia($id) {
        $data = MasterSurat::where('desa_adat_id', $id)
                    ->where('keterangan', 'not like', '%Panitia%')
                    ->where('keterangan', 'not like', '%Panitia')
                    ->where('keterangan', 'not like', 'Panitia%')
                    ->get();
        $data_cek = MasterSurat::where('desa_adat_id', $id)
                    ->where('keterangan', 'not like', '%Panitia%')
                    ->where('keterangan', 'not like', '%Panitia')
                    ->where('keterangan', 'not like', 'Panitia%')
                    ->first();
        if($data_cek == null) {
            return response()->json([
                'status' => 'Failed',
                'message' => 'Kode Surat Tidak Ditemukan!'
            ], 500);
        }else{
            return response()->json($data, 200);
        }
    }

    public function index_surat_keluar($id) {
        $data = SuratKeluar::join('tb_m_desa_adat', 'tb_surat_keluar.desa_adat_id', '=', 'tb_m_desa_adat.desa_adat_id')
        ->join('tb_m_kecamatan', 'tb_m_desa_adat.kecamatan_id', '=', 'tb_m_kecamatan.kecamatan_id')
        ->join('tb_m_kabupaten', 'tb_m_kecamatan.kabupaten_id', '=', 'tb_m_kabupaten.kabupaten_id')
        ->where('tb_surat_keluar.surat_keluar_id', $id)
        ->first();
        return view('surat-keluar', ['data' => $data]);
    }

    public function show_detail_panitia_surat_keluar($id) {
        Request()->validate([
            'jabatan' => 'required'
        ]);
        $data = ValidasiPanitia::join('tb_krama_mipil', 'tb_validasi_panitia.krama_mipil_id', '=', 'tb_krama_mipil.krama_mipil_id')
                                ->join('tb_cacah_krama_mipil', 'tb_cacah_krama_mipil.cacah_krama_mipil_id', 'tb_krama_mipil.cacah_krama_mipil_id')
                                ->join('tb_penduduk', 'tb_penduduk.penduduk_id', '=', 'tb_cacah_krama_mipil.penduduk_id')
                                ->where('jabatan', Request()->jabatan)
                                ->where('surat_keluar_id', $id)
                                ->first();
        return response()->json($data, 200);
    }

    public function show_detail_prajuru_surat_keluar($id) {
        Request()->validate([
            'jabatan' => 'required'
        ]);
        $data = ValidasiPrajuruDesa::join('tb_prajuru_desa_adat', 'tb_validasi_prajuru_desa.prajuru_desa_adat_id', 'tb_prajuru_desa_adat.prajuru_desa_adat_id')
                                    ->join('tb_krama_mipil', 'tb_prajuru_desa_adat.krama_mipil_id', '=', 'tb_krama_mipil.krama_mipil_id')
                                    ->join('tb_cacah_krama_mipil', 'tb_cacah_krama_mipil.cacah_krama_mipil_id', 'tb_krama_mipil.cacah_krama_mipil_id')
                                    ->join('tb_penduduk', 'tb_penduduk.penduduk_id', '=', 'tb_cacah_krama_mipil.penduduk_id')
                                    ->where('jabatan', Request()->jabatan)
                                    ->where('surat_keluar_id', $id)
                                    ->first();
        return response()->json($data, 200);
    }

    public function print_pdf_surat_keluar($id) {
        $data = SuratKeluar::join('tb_m_desa_adat', 'tb_surat_keluar.desa_adat_id', '=', 'tb_m_desa_adat.desa_adat_id')
        ->join('tb_m_kecamatan', 'tb_m_desa_adat.kecamatan_id', '=', 'tb_m_kecamatan.kecamatan_id')
        ->join('tb_m_kabupaten', 'tb_m_kecamatan.kabupaten_id', '=', 'tb_m_kabupaten.kabupaten_id')
        ->where('tb_surat_keluar.surat_keluar_id', $id)
        ->first();
        $pdf = PDF::loadview('surat-keluar', ['data' => $data]);
        $file = $pdf->download('surat-keluar.pdf');
        return response()->json([
            'status' => 'OK'
        ], 200);
    }

    public function up_surat_keluar_non_panitia(Request $request) {
        $surat_keluar = new SuratKeluar();
        $validasi_panitia = new ValidasiPanitia();
        $validasi_prajuru = new ValidasiPrajuruDesa();
        $master_surat = MasterSurat::where('kode_nomor_surat', $request->master_surat)->first();
        $master_surat_decode = json_decode($master_surat);
        $surat_keluar->master_surat_id = $master_surat_decode->master_surat_id;
        $surat_keluar->desa_adat_id = $request->desa_adat_id;
        $surat_keluar->lepihan = $request->lepihan;
        $surat_keluar->parindikan = $request->parindikan;
        $surat_keluar->tumusan = $request->tumusan ? : NULL;
        $surat_keluar->pamahbah_surat = $request->pemahbah_surat;
        $surat_keluar->daging_surat = $request->daging_surat ? : NULL;
        $surat_keluar->pamuput_surat = $request->pamuput_surat ? : NULL;
        $surat_keluar->tanggal_kegiatan_mulai = $request->tanggal_mulai ? : NULL;
        $surat_keluar->tanggal_kegiatan_berakhir = $request->tanggal_selesai ? : NULL;
        $surat_keluar->busana = $request->busana ? : NULL;
        $surat_keluar->tempat_kegiatan = $request->tempat_kegiatan ? : NULL;
        $surat_keluar->waktu_kegiatan_mulai = $request->waktu_mulai ? : NULL;
        $surat_keluar->waktu_kegiatan_selesai = $request->waktu_selesai ? : NULL;
        $surat_keluar->tim_kegiatan = $request->tim_kegiatan ? : NULL;
        $surat_keluar->pihak_penerima = $request->pihak_penerima;
        $surat_keluar->lampiran = $request->lampiran ? : NULL;  
        $surat_keluar->nomor_surat = $request->nomor_surat;
        $surat_keluar->status = "Menunggu Respons";
        $surat_keluar->tanggal_surat = $request->tanggal_surat;
        $surat_keluar->save();
        $nomor_surat = SuratKeluar::max('surat_keluar_id');

        $data_bendesa = [
            'prajuru_desa_adat_id' => $request->bendesa_adat_id,
            'surat_keluar_id' => $nomor_surat
        ];
        $validasi_prajuru->TambahDataValidasiPrajuru($data_bendesa);
        $data_penyarikan = [
            'prajuru_desa_adat_id' => $request->penyarikan_id,
            'surat_keluar_id' => $nomor_surat
        ];
        $validasi_prajuru->TambahDataValidasiPrajuru($data_penyarikan);
        return response()->json([
            'status' => 'OK',
            'message' => 'Data Surat Keluar Berhasil Disimpan!'
        ], 200);
    }

    public function show_surat_keluar_non_panitia($id) {
        Request()->validate([
            'status' => 'required'
        ]);

        $data_cek = SuratKeluar::join('tb_master_surat', 'tb_surat_keluar.master_surat_id', '=', 'tb_master_surat.master_surat_id')
                            ->where('tb_master_surat.keterangan', 'not like', '%Panitia%')
                            ->where('tb_master_surat.keterangan', 'not like', '%Panitia')
                            ->where('tb_master_surat.keterangan', 'not like', 'Panitia%')
                            ->where('tb_surat_keluar.desa_adat_id', $id)
                            ->where('tb_surat_keluar.status', Request()->status)
                            ->first();

        $data = SuratKeluar::join('tb_master_surat', 'tb_surat_keluar.master_surat_id', '=', 'tb_master_surat.master_surat_id')
                            ->where('tb_master_surat.keterangan', 'not like', '%Panitia%')
                            ->where('tb_master_surat.keterangan', 'not like', '%Panitia')
                            ->where('tb_master_surat.keterangan', 'not like', 'Panitia%')
                            ->where('tb_surat_keluar.desa_adat_id', $id)
                            ->where('tb_surat_keluar.status', Request()->status)
                            ->get();

        if($data_cek == null) {
            return response()->json([
                'status' => 'Failed',
                'message' => 'Data Surat Keluar Tidak Ditemukan!'
            ], 500);
        }else{
            return response()->json($data, 200);
        }   
    }

    public function show_kode_surat_panitia($id) {
        $data = MasterSurat::where('desa_adat_id', $id)
                            ->where('keterangan', 'like', '%Panitia%')
                            ->orWhere('keterangan', 'like', '%Panitia')
                            ->orWhere('keterangan', 'like', 'Panitia%')
                            ->get();
        $data_cek = MasterSurat::where('desa_adat_id', $id)
                            ->where('keterangan', 'like', '%Panitia%')
                            ->orWhere('keterangan', 'like', '%Panitia')
                            ->orWhere('keterangan', 'like', 'Panitia%')
                            ->first();
        if($data_cek == null) {
            return response()->json([
                'status' => 'Failed',
                'message' => 'Kode Surat Tidak Ditemukan!'
            ], 500);
        }else{
            return response()->json($data, 200);
        }
    }

    public function up_surat_keluar_panitia(Request $request) {
        $surat_keluar = new SuratKeluar();
        $validasi_panitia = new ValidasiPanitia();
        $validasi_prajuru = new ValidasiPrajuruDesa();
        $master_surat = MasterSurat::where('kode_nomor_surat', $request->master_surat)->first();
        $master_surat_decode = json_decode($master_surat);
        $surat_keluar->master_surat_id = $master_surat_decode->master_surat_id;
        $surat_keluar->desa_adat_id = $request->desa_adat_id;
        $surat_keluar->lepihan = $request->lepihan;
        $surat_keluar->parindikan = $request->parindikan;
        $surat_keluar->tumusan = $request->tumusan ? : NULL;
        $surat_keluar->pamahbah_surat = $request->pemahbah_surat;
        $surat_keluar->daging_surat = $request->daging_surat ? : NULL;
        $surat_keluar->pamuput_surat = $request->pamuput_surat ? : NULL;
        $surat_keluar->tanggal_kegiatan_mulai = $request->tanggal_mulai ? : NULL;
        $surat_keluar->tanggal_kegiatan_berakhir = $request->tanggal_selesai ? : NULL;
        $surat_keluar->busana = $request->busana ? : NULL;
        $surat_keluar->tempat_kegiatan = $request->tempat_kegiatan ? : NULL;
        $surat_keluar->waktu_kegiatan_mulai = $request->waktu_mulai ? : NULL;
        $surat_keluar->waktu_kegiatan_selesai = $request->waktu_selesai ? : NULL;
        $surat_keluar->tim_kegiatan = $request->tim_kegiatan ? : NULL;
        $surat_keluar->pihak_penerima = $request->pihak_penerima;
        $surat_keluar->lampiran = $request->lampiran ? : NULL;  
        $surat_keluar->nomor_surat = $request->nomor_surat;
        $surat_keluar->status = "Menunggu Respons";
        $surat_keluar->tanggal_surat = $request->tanggal_surat;
        $surat_keluar->save();
        $last_surat_keluar_id = $surat_keluar->id;
        $nomor_surat = SuratKeluar::max('surat_keluar_id');

        $data_bendesa = [
            'prajuru_desa_adat_id' => $request->bendesa_adat_id,
            'surat_keluar_id' => $nomor_surat
        ];
        $validasi_prajuru->TambahDataValidasiPrajuru($data_bendesa);

        $data_ketua_panitia = [
            'krama_mipil_id' => $request->krama_mipil_ketua_id,
            'surat_keluar_id' => $nomor_surat,
            'jabatan' => 'Ketua Panitia'
        ];
        $validasi_panitia->TambahDataValidasiPanitia($data_ketua_panitia);
        $data_sekretaris_panitia = [
            'krama_mipil_id' => $request->krama_mipil_sekretaris_id,
            'surat_keluar_id' => $nomor_surat,
            'jabatan' => 'Sekretaris Panitia'
        ];
        $validasi_panitia->TambahDataValidasiPanitia($data_sekretaris_panitia);
        
        return response()->json($nomor_surat, 200);
    }

    public function show_surat_keluar_edit($id) {
        $data = DB::table('tb_surat_keluar')
                    ->select()
                    ->join('tb_master_surat', 'tb_surat_keluar.master_surat_id', 'tb_master_surat.master_surat_id')
                    ->where('tb_surat_keluar.surat_keluar_id', $id)
                    ->first();
        return response()->json($data, 200);
    }

    public function show_nomor_surat_edit($id) {
        Request()->validate([
            'desa_adat_id' => 'required'
        ]);
        $kode_desa = DesaAdat::select('desadat_kode_surat')->where('desa_adat_id', Request()->desa_adat_id)->first();
        $bulan_romawi = array("", "I", "II", "III", "IV", "V", "VII", "VIII", "IX", "X", "XI", "XII");
        $kode_surat = json_decode($kode_desa);
        $data = [
            'nomor_urut_surat' => sprintf("%03s", $id),
            'kode_desa' => $kode_surat->desadat_kode_surat,
            'bulan' => $bulan_romawi[date('n')],
            'tahun' => date('Y')
        ];
        return response()->json($data, 200);
    }

    public function simpan_edit_surat_keluar_panitia(Request $request) {
        $surat_keluar = SuratKeluar::find($request->surat_keluar_id);
        $validasi_panitia = new ValidasiPanitia();
        $validasi_prajuru = new ValidasiPrajuruDesa();

        $master_surat = MasterSurat::where('kode_nomor_surat', $request->master_surat)->first();
        $master_surat_decode = json_decode($master_surat);
        $surat_keluar->master_surat_id = $master_surat_decode->master_surat_id;
        $surat_keluar->desa_adat_id = $request->desa_adat_id;
        $surat_keluar->lepihan = $request->lepihan;
        $surat_keluar->parindikan = $request->parindikan;
        $surat_keluar->tumusan = $request->tumusan ? : NULL;
        $surat_keluar->pamahbah_surat = $request->pemahbah_surat;
        $surat_keluar->daging_surat = $request->daging_surat ? : NULL;
        $surat_keluar->pamuput_surat = $request->pamuput_surat ? : NULL;
        $surat_keluar->tanggal_kegiatan_mulai = $request->tanggal_mulai ? : NULL;
        $surat_keluar->tanggal_kegiatan_berakhir = $request->tanggal_selesai ? : NULL;
        $surat_keluar->busana = $request->busana ? : NULL;
        $surat_keluar->tempat_kegiatan = $request->tempat_kegiatan ? : NULL;
        $surat_keluar->waktu_kegiatan_mulai = $request->waktu_mulai ? : NULL;
        $surat_keluar->waktu_kegiatan_selesai = $request->waktu_selesai ? : NULL;
        $surat_keluar->tim_kegiatan = $request->tim_kegiatan ? : NULL;
        $surat_keluar->pihak_penerima = $request->pihak_penerima;
        $surat_keluar->lampiran = $request->lampiran ? : NULL;  
        $surat_keluar->nomor_surat = $request->nomor_surat;
        $surat_keluar->tanggal_surat = $request->tanggal_surat;
        $surat_keluar->status = "Menunggu Respons";
        $surat_keluar->update();

        $id_bendesa = ValidasiPrajuruDesa::join('tb_prajuru_desa_adat', 'tb_validasi_prajuru_desa.prajuru_desa_adat_id', 'tb_prajuru_desa_adat.prajuru_desa_adat_id')
                                    ->join('tb_krama_mipil', 'tb_prajuru_desa_adat.krama_mipil_id', '=', 'tb_krama_mipil.krama_mipil_id')
                                    ->join('tb_cacah_krama_mipil', 'tb_cacah_krama_mipil.cacah_krama_mipil_id', 'tb_krama_mipil.cacah_krama_mipil_id')
                                    ->join('tb_penduduk', 'tb_penduduk.penduduk_id', '=', 'tb_cacah_krama_mipil.penduduk_id')
                                    ->where('jabatan', "bendesa")
                                    ->where('surat_keluar_id', $request->surat_keluar_id)
                                    ->first();
        $bendesa_decode = json_decode($id_bendesa);
        $id_bendesa_old = $bendesa_decode->prajuru_desa_adat_id;
        $data_ketua_panitia = [
            'krama_mipil_id' => $request->krama_mipil_ketua_id
        ];
        $jabatan_ketua = "Ketua Panitia";
        $validasi_panitia->EditDataValidasiPanitia($data_ketua_panitia, $request->surat_keluar_id, $jabatan_ketua);
        $data_sekretaris_panitia = [
            'krama_mipil_id' => $request->krama_mipil_sekretaris_id
        ];
        $jabatan_sekretaris = "Sekretaris Panitia";
        $validasi_panitia->EditDataValidasiPanitia($data_sekretaris_panitia, $request->surat_keluar_id, $jabatan_sekretaris);
        $data_bendesa = [
            'prajuru_desa_adat_id' => $request->bendesa_adat_id
        ];
        $validasi_prajuru->EditDataValidasiPrajuru($data_bendesa, $request->surat_keluar_id, $id_bendesa_old);
        return response()->json([
            'status' => 'OK',
            'message' => 'Data Surat Keluar berhasil Diperbaharui!'
        ], 200);
    }

    public function simpan_edit_surat_keluar_non_panitia(Request $request) {
        $surat_keluar = SuratKeluar::find($request->surat_keluar_id);
        $validasi_prajuru = new ValidasiPrajuruDesa();

        $master_surat = MasterSurat::where('kode_nomor_surat', $request->master_surat)->first();
        $master_surat_decode = json_decode($master_surat);
        $surat_keluar->master_surat_id = $master_surat_decode->master_surat_id;
        $surat_keluar->desa_adat_id = $request->desa_adat_id;
        $surat_keluar->lepihan = $request->lepihan;
        $surat_keluar->parindikan = $request->parindikan;
        $surat_keluar->tumusan = $request->tumusan ? : NULL;
        $surat_keluar->pamahbah_surat = $request->pemahbah_surat;
        $surat_keluar->daging_surat = $request->daging_surat ? : NULL;
        $surat_keluar->pamuput_surat = $request->pamuput_surat ? : NULL;
        $surat_keluar->tanggal_kegiatan_mulai = $request->tanggal_mulai ? : NULL;
        $surat_keluar->tanggal_kegiatan_berakhir = $request->tanggal_selesai ? : NULL;
        $surat_keluar->busana = $request->busana ? : NULL;
        $surat_keluar->tempat_kegiatan = $request->tempat_kegiatan ? : NULL;
        $surat_keluar->waktu_kegiatan_mulai = $request->waktu_mulai ? : NULL;
        $surat_keluar->waktu_kegiatan_selesai = $request->waktu_selesai ? : NULL;
        $surat_keluar->tim_kegiatan = $request->tim_kegiatan ? : NULL;
        $surat_keluar->pihak_penerima = $request->pihak_penerima;
        $surat_keluar->lampiran = $request->lampiran ? : NULL;  
        $surat_keluar->nomor_surat = $request->nomor_surat;
        $surat_keluar->tanggal_surat = $request->tanggal_surat;
        $surat_keluar->status = "Menunggu Respons";
        $surat_keluar->update();

        $id_bendesa = ValidasiPrajuruDesa::join('tb_prajuru_desa_adat', 'tb_validasi_prajuru_desa.prajuru_desa_adat_id', 'tb_prajuru_desa_adat.prajuru_desa_adat_id')
        ->join('tb_krama_mipil', 'tb_prajuru_desa_adat.krama_mipil_id', '=', 'tb_krama_mipil.krama_mipil_id')
        ->join('tb_cacah_krama_mipil', 'tb_cacah_krama_mipil.cacah_krama_mipil_id', 'tb_krama_mipil.cacah_krama_mipil_id')
        ->join('tb_penduduk', 'tb_penduduk.penduduk_id', '=', 'tb_cacah_krama_mipil.penduduk_id')
        ->where('jabatan', "bendesa")
        ->where('surat_keluar_id', $request->surat_keluar_id)
        ->first();

        $id_penyarikan = ValidasiPrajuruDesa::join('tb_prajuru_desa_adat', 'tb_validasi_prajuru_desa.prajuru_desa_adat_id', 'tb_prajuru_desa_adat.prajuru_desa_adat_id')
        ->join('tb_krama_mipil', 'tb_prajuru_desa_adat.krama_mipil_id', '=', 'tb_krama_mipil.krama_mipil_id')
        ->join('tb_cacah_krama_mipil', 'tb_cacah_krama_mipil.cacah_krama_mipil_id', 'tb_krama_mipil.cacah_krama_mipil_id')
        ->join('tb_penduduk', 'tb_penduduk.penduduk_id', '=', 'tb_cacah_krama_mipil.penduduk_id')
        ->where('jabatan', "penyarikan")
        ->where('surat_keluar_id', $request->surat_keluar_id)
        ->first();

        $bendesa_decode = json_decode($id_bendesa);
        $id_bendesa_old = $bendesa_decode->prajuru_desa_adat_id;

        $penyarikan_decode = json_decode($id_penyarikan);
        $id_penyarikan_old = $penyarikan_decode->prajuru_desa_adat_id;
        $data_bendesa = [
            'prajuru_desa_adat_id' => $request->bendesa_adat_id
        ];
        $validasi_prajuru->EditDataValidasiPrajuru($data_bendesa, $request->surat_keluar_id, $id_bendesa_old);
        $data_penyarikan = [
            'prajuru_desa_adat_id' => $request->penyarikan_id
        ];
        $validasi_prajuru->EditDataValidasiPrajuru($data_penyarikan, $request->surat_keluar_id, $id_penyarikan_old);
        return response()->json([
            'status' => 'OK',
            'message' => 'Data Surat Keluar berhasil Diperbaharui!'
        ], 200);
    }

    public function show_list_surat_masuk($id) {
        $data = SuratMasuk::where('desa_adat_id', $id)->get();
        $data_cek = SuratMasuk::where('desa_adat_id', $id)->first();
        if($data_cek == null) {
            return response()->json([
                'status' => 'Failed',
                'message' => 'Data Surat Masuk Tidak Ditemukan!'
            ], 500);
        }else{
            return response()->json($data, 200);
        }
    }

    public function simpan_surat_masuk(Request $request) {
        $surat_masuk = new SuratMasuk();
        $tanggal_sekarang = Carbon::now()->toDateTimeString();
        $surat_masuk->master_surat_id = $request->master_surat_id;
        $surat_masuk->perihal = $request->perihal;
        $surat_masuk->asal_surat = $request->asal_surat;
        $surat_masuk->tanggal_surat = $request->tanggal_surat;
        $surat_masuk->tanggal_diterima = $tanggal_sekarang;
        $surat_masuk->tanggal_kegiatan_mulai = $request->tanggal_kegiatan_mulai ? : NULL;
        $surat_masuk->tanggal_kegiatan_berakhir = $request->tanggal_kegiatan_berakhir ? : NULL;
        $surat_masuk->waktu_kegiatan_mulai = $request->waktu_kegiatan_mulai ? : NULL;
        $surat_masuk->waktu_kegiatan_selesai = $request->waktu_kegiatan_selesai ? : NULL;
        $surat_masuk->prajuru_desa_adat_id = $request->prajuru_desa_adat_id;
        $surat_masuk->file = $request->file;
        $surat_masuk->desa_adat_id = $request->desa_adat_id;
        $surat_masuk->nomor_surat = $request->nomor_surat;
        $surat_masuk->save();
        return response()->json([
            'status' => 'OK',
            'message' => 'Data Surat Masuk berhasil Diperbaharui!'
        ], 200);
    }

    public function show_detail_surat_masuk($id) {
        $data = SuratMasuk::join('tb_prajuru_desa_adat', 'tb_surat_masuk.prajuru_desa_adat_id', '=', 'tb_prajuru_desa_adat.prajuru_desa_adat_id')
                            ->join('tb_krama_mipil', 'tb_prajuru_desa_adat.krama_mipil_id', '=', 'tb_krama_mipil.krama_mipil_id')
                            ->join('tb_cacah_krama_mipil', 'tb_krama_mipil.cacah_krama_mipil_id', '=', 'tb_cacah_krama_mipil.cacah_krama_mipil_id')
                            ->join('tb_penduduk', 'tb_cacah_krama_mipil.penduduk_id', '=', 'tb_penduduk.penduduk_id')
                            ->join('tb_master_surat', 'tb_master_surat.master_surat_id', '=', 'tb_surat_masuk.master_surat_id')
                            ->where('tb_surat_masuk.surat_masuk_id', $id)
                            ->first();
        return response()->json($data, 200);
    }

    public function show_edit_surat_masuk($id) {
        $data = DB::table('tb_surat_masuk')->where('tb_surat_masuk.surat_masuk_id', $id)->first();
        return response()->json($data, 200);
    }

    public function simpan_edit_surat_masuk(Request $request) {
        $surat_masuk = SuratMasuk::find($request->surat_keluar_id);
        $surat_masuk->master_surat_id = $request->master_surat_id;
        $surat_masuk->nomor_surat = $request->nomor_surat;
        $surat_masuk->perihal = $request->perihal;
        $surat_masuk->asal_surat = $request->asal_surat;
        $surat_masuk->tanggal_surat = $request->tanggal_surat;
        $surat_masuk->tanggal_kegiatan_mulai = $request->tanggal_kegiatan_mulai ? : NULL;
        $surat_masuk->tanggal_kegiatan_berakhir = $request->tanggal_kegiatan_berakhir ? : NULL;
        $surat_masuk->waktu_kegiatan_mulai = $request->waktu_kegiatan_mulai ? : NULL;
        $surat_masuk->waktu_kegiatan_selesai = $request->waktu_kegiatan_selesai ? : NULL;
        $surat_masuk->file = $request->file;
        $surat_masuk->desa_adat_id = $request->desa_adat_id;
        $surat_masuk->update();
        return response()->json([
            'status' => 'Berhasil',
            'message' => 'Data Surat Masuk berhasil Diperbaharui!'
        ], 200);
    }

    public function delete_surat_masuk() {
        Request()->validate([
            'surat_masuk_id' => 'required'
        ]);
        $this->SuratMasuk->HapusSuratMasuk(Request()->surat_masuk_id);
        return response()->json([
            'status' => 'OK',
            'message' => 'Data Surat Masuk Berhasil Dihapus!'
        ], 200);
    }

    public function show_surat_panitia_by_krama_mipil($id) {
        $data = ValidasiPanitia::where('krama_mipil_id', $id)->get();
        $data_cek = ValidasiPanitia::where('krama_mipil_id', $id)->first();
        if($data_cek == null) {
            return response()->json([
                'status' => 'Failed',
                'message' => 'Data Surat Keluar Tidak Ditemukan'
            ], 500);
        }else{
            return response($data, 200);
        }
    }

    public function count_surat_panitia_belum_validasi($id) {
        $data = ValidasiPanitia::where('krama_mipil_id', $id)
                                ->where('validasi', null)
                                ->count();
        return response()->json($data, 200);
    }

    public function show_surat_panitia_belum_validasi($id) {
        $data = ValidasiPanitia::join('tb_surat_keluar', 'tb_validasi_panitia.surat_keluar_id', '=', 'tb_surat_keluar.surat_keluar_id')
                                ->where('tb_validasi_panitia.krama_mipil_id', $id)
                                ->whereNull('tb_validasi_panitia.validasi')
                                ->get();
        $data_cek = ValidasiPanitia::join('tb_surat_keluar', 'tb_validasi_panitia.surat_keluar_id', '=', 'tb_surat_keluar.surat_keluar_id')
                                ->where('tb_validasi_panitia.krama_mipil_id', $id)
                                ->whereNull('tb_validasi_panitia.validasi')
                                ->first();
        if($data_cek == null) {
            return response()->json([
                'status' => 'Failed',
                'message' => 'Data Surat Keluar Tidak Ditemukan!'
            ], 500);
        }else{
            return response()->json($data, 200);
        }
    }

    public function show_surat_panitia_sudah_validasi($id) {
        $data = ValidasiPanitia::join('tb_surat_keluar', 'tb_validasi_panitia.surat_keluar_id', '=', 'tb_surat_keluar.surat_keluar_id')
                                ->where('tb_validasi_panitia.krama_mipil_id', $id)
                                ->whereNotNull('tb_validasi_panitia.validasi')
                                ->get();
        $data_cek = ValidasiPanitia::join('tb_surat_keluar', 'tb_validasi_panitia.surat_keluar_id', '=', 'tb_surat_keluar.surat_keluar_id')
                                ->where('tb_validasi_panitia.krama_mipil_id', $id)
                                ->whereNotNull('tb_validasi_panitia.validasi')
                                ->first();
        if($data_cek == null) {
            return response()->json([
                'status' => 'Failed',
                'message' => 'Data Surat Keluar Tidak Ditemukan!'
            ], 500);
        }else{
            return response()->json($data, 200);
        }
    }
}