<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PrajuruBanjarAdat;
use App\Models\PrajuruDesaAdat;
use App\Models\Penduduk;
use App\Models\Pengguna;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class DataStaffController extends Controller
{
    public function __construct() {
        $this->PrajuruBanjarAdat = new PrajuruBanjarAdat();
        $this->PrajuruDesaAdat = new PrajuruDesaAdat();
        $this->Penduduk = new Penduduk();
        $this->Pengguna = new Pengguna();
    }

    public function show_list_prajuru_desa_adat_aktif($id) {
        $data = PrajuruDesaAdat::join('tb_krama_mipil', 'tb_prajuru_desa_adat.krama_mipil_id', '=', 'tb_krama_mipil.krama_mipil_id')
                                ->join('tb_cacah_krama_mipil', 'tb_krama_mipil.cacah_krama_mipil_id', '=', 'tb_cacah_krama_mipil.cacah_krama_mipil_id')
                                ->join('tb_penduduk', 'tb_cacah_krama_mipil.penduduk_id', '=', 'tb_penduduk.penduduk_id')
                                ->where('tb_prajuru_desa_adat.desa_adat_id', $id)
                                ->where('tb_prajuru_desa_adat.status_prajuru_desa_adat', 'aktif')
                                ->get();
        $data_cek = PrajuruDesaAdat::join('tb_krama_mipil', 'tb_prajuru_desa_adat.krama_mipil_id', '=', 'tb_krama_mipil.krama_mipil_id')
                                ->join('tb_cacah_krama_mipil', 'tb_krama_mipil.cacah_krama_mipil_id', '=', 'tb_cacah_krama_mipil.cacah_krama_mipil_id')
                                ->join('tb_penduduk', 'tb_cacah_krama_mipil.penduduk_id', '=', 'tb_penduduk.penduduk_id')
                                ->where('tb_prajuru_desa_adat.desa_adat_id', $id)
                                ->where('tb_prajuru_desa_adat.status_prajuru_desa_adat', 'aktif')
                                ->first();
        if($data_cek == null) {
            return response()->json([
                'status' => 'Failed',
                'message' => 'Data Staff Prajuru Desa Adat Tidak Ditemukan!'
            ], 501);
        }else{
            return response()->json($data, 200);
        }
    }
    public function show_list_prajuru_desa_adat_tidak_aktif($id) {
        $data = PrajuruDesaAdat::join('tb_krama_mipil', 'tb_prajuru_desa_adat.krama_mipil_id', '=', 'tb_krama_mipil.krama_mipil_id')
                                ->join('tb_cacah_krama_mipil', 'tb_krama_mipil.cacah_krama_mipil_id', '=', 'tb_cacah_krama_mipil.cacah_krama_mipil_id')
                                ->join('tb_penduduk', 'tb_cacah_krama_mipil.penduduk_id', '=', 'tb_penduduk.penduduk_id')
                                ->where('tb_prajuru_desa_adat.desa_adat_id', $id)
                                ->where('tb_prajuru_desa_adat.status_prajuru_desa_adat', 'tidak aktif')
                                ->get();
        $data_cek = PrajuruDesaAdat::join('tb_krama_mipil', 'tb_prajuru_desa_adat.krama_mipil_id', '=', 'tb_krama_mipil.krama_mipil_id')
                                ->join('tb_cacah_krama_mipil', 'tb_krama_mipil.cacah_krama_mipil_id', '=', 'tb_cacah_krama_mipil.cacah_krama_mipil_id')
                                ->join('tb_penduduk', 'tb_cacah_krama_mipil.penduduk_id', '=', 'tb_penduduk.penduduk_id')
                                ->where('tb_prajuru_desa_adat.desa_adat_id', $id)
                                ->where('tb_prajuru_desa_adat.status_prajuru_desa_adat', 'tidak aktif')
                                ->first();
        if($data_cek == null) {
            return response()->json([
                'status' => 'Failed',
                'message' => 'Data Staff Prajuru Desa Adat Tidak Ditemukan!'
            ], 501);
        }else{
            return response()->json($data, 200);
        }
    }

    public function show_detail_prajuru_desa_adat($id) {
        $data = PrajuruDesaAdat::join('tb_krama_mipil', 'tb_prajuru_desa_adat.krama_mipil_id', '=', 'tb_krama_mipil.krama_mipil_id')
                                ->join('tb_cacah_krama_mipil', 'tb_krama_mipil.cacah_krama_mipil_id', '=', 'tb_cacah_krama_mipil.cacah_krama_mipil_id')
                                ->join('tb_penduduk', 'tb_cacah_krama_mipil.penduduk_id', '=', 'tb_penduduk.penduduk_id')
                                ->join('tb_m_profesi', 'tb_penduduk.profesi_id', '=', 'tb_m_profesi.profesi_id')
                                ->where('tb_prajuru_desa_adat.prajuru_desa_adat_id', $id)
                                ->first();
        return response()->json($data, 200);
    }

    public function set_staff_tidak_aktif() {
        Request()->validate([
            'prajuru_desa_adat_id' => 'required',
            'penduduk_id' => 'required'
        ]);
        $data = [
            'prajuru_desa_adat_id' => Request()->prajuru_desa_adat_id,
            'status_prajuru_desa_adat' => 'tidak aktif'
        ];
        $this->PrajuruDesaAdat->EditPrajuruDesaAdat(Request()->prajuru_desa_adat_id, $data);
        return response()->json([
            'status' => 'OK',
            'message' => 'Atur Status menjadi Tidak Aktif Berhasil!'
        ], 200);
    }

    public function show_detail_prajuru_desa_adat_edit($id) {
        $data = DB::table('tb_prajuru_desa_adat')
                                ->join('tb_krama_mipil', 'tb_prajuru_desa_adat.krama_mipil_id', '=', 'tb_krama_mipil.krama_mipil_id')
                                ->join('tb_cacah_krama_mipil', 'tb_krama_mipil.cacah_krama_mipil_id', '=', 'tb_cacah_krama_mipil.cacah_krama_mipil_id')
                                ->join('tb_penduduk', 'tb_cacah_krama_mipil.penduduk_id', '=', 'tb_penduduk.penduduk_id')
                                ->join('tb_m_profesi', 'tb_penduduk.profesi_id', '=', 'tb_m_profesi.profesi_id')
                                ->join('tb_sso', 'tb_sso.penduduk_id', '=', 'tb_cacah_krama_mipil.penduduk_id')
                                ->where('tb_prajuru_desa_adat.prajuru_desa_adat_id', $id)
                                ->first();
        return response()->json($data, 200);
    }

    public function show_list_prajuru_banjar_adat_aktif($id) {
        $data = PrajuruBanjarAdat::join('tb_m_banjar_adat', 'tb_prajuru_banjar_adat.banjar_adat_id', '=', 'tb_m_banjar_adat.banjar_adat_id')
                                ->join('tb_krama_mipil', 'tb_prajuru_banjar_adat.krama_mipil_id', '=', 'tb_krama_mipil.krama_mipil_id')
                                ->join('tb_cacah_krama_mipil', 'tb_krama_mipil.cacah_krama_mipil_id', '=', 'tb_cacah_krama_mipil.cacah_krama_mipil_id')
                                ->join('tb_penduduk', 'tb_cacah_krama_mipil.penduduk_id', '=', 'tb_penduduk.penduduk_id')
                                ->where('tb_m_banjar_adat.desa_adat_id', $id)
                                ->where('tb_prajuru_banjar_adat.status_prajuru_banjar_adat', 'aktif')
                                ->get();
        $data_cek = PrajuruBanjarAdat::join('tb_m_banjar_adat', 'tb_prajuru_banjar_adat.banjar_adat_id', '=', 'tb_m_banjar_adat.banjar_adat_id')
                                ->join('tb_krama_mipil', 'tb_prajuru_banjar_adat.krama_mipil_id', '=', 'tb_krama_mipil.krama_mipil_id')
                                ->join('tb_cacah_krama_mipil', 'tb_krama_mipil.cacah_krama_mipil_id', '=', 'tb_cacah_krama_mipil.cacah_krama_mipil_id')
                                ->join('tb_penduduk', 'tb_cacah_krama_mipil.penduduk_id', '=', 'tb_penduduk.penduduk_id')
                                ->where('tb_m_banjar_adat.desa_adat_id', $id)
                                ->where('tb_prajuru_banjar_adat.status_prajuru_banjar_adat', 'aktif')
                                ->first();
        if($data_cek == null) {
            return response()->json([
                'status' => 'Failed',
                'message' => 'Data Staff Prajuru Banjar Adat Tidak Ditemukan!'
            ], 501);
        }else{
            return response()->json($data, 200);
        }
    }

    public function show_list_prajuru_banjar_adat_tidak_aktif($id) {
        $data = PrajuruBanjarAdat::join('tb_m_banjar_adat', 'tb_prajuru_banjar_adat.banjar_adat_id', '=', 'tb_m_banjar_adat.banjar_adat_id')
                                ->join('tb_krama_mipil', 'tb_prajuru_banjar_adat.krama_mipil_id', '=', 'tb_krama_mipil.krama_mipil_id')
                                ->join('tb_cacah_krama_mipil', 'tb_krama_mipil.cacah_krama_mipil_id', '=', 'tb_cacah_krama_mipil.cacah_krama_mipil_id')
                                ->join('tb_penduduk', 'tb_cacah_krama_mipil.penduduk_id', '=', 'tb_penduduk.penduduk_id')
                                ->where('tb_m_banjar_adat.desa_adat_id', $id)
                                ->where('tb_prajuru_banjar_adat.status_prajuru_banjar_adat', 'tidak aktif')
                                ->get();
        $data_cek = PrajuruBanjarAdat::join('tb_m_banjar_adat', 'tb_prajuru_banjar_adat.banjar_adat_id', '=', 'tb_m_banjar_adat.banjar_adat_id')
                                ->join('tb_krama_mipil', 'tb_prajuru_banjar_adat.krama_mipil_id', '=', 'tb_krama_mipil.krama_mipil_id')
                                ->join('tb_cacah_krama_mipil', 'tb_krama_mipil.cacah_krama_mipil_id', '=', 'tb_cacah_krama_mipil.cacah_krama_mipil_id')
                                ->join('tb_penduduk', 'tb_cacah_krama_mipil.penduduk_id', '=', 'tb_penduduk.penduduk_id')
                                ->where('tb_m_banjar_adat.desa_adat_id', $id)
                                ->where('tb_prajuru_banjar_adat.status_prajuru_banjar_adat', 'tidak aktif')
                                ->first();
        if($data_cek == null) {
            return response()->json([
                'status' => 'Failed',
                'message' => 'Data Staff Prajuru Banjar Adat Tidak Ditemukan!'
            ], 501);
        }else{
            return response()->json($data, 200);
        }
    }

    public function show_detail_prajuru_banjar_adat($id) {
        $data = PrajuruBanjarAdat::join('tb_m_banjar_adat', 'tb_prajuru_banjar_adat.banjar_adat_id', '=', 'tb_m_banjar_adat.banjar_adat_id')
                                ->join('tb_krama_mipil', 'tb_prajuru_banjar_adat.krama_mipil_id', '=', 'tb_krama_mipil.krama_mipil_id')
                                ->join('tb_cacah_krama_mipil', 'tb_krama_mipil.cacah_krama_mipil_id', '=', 'tb_cacah_krama_mipil.cacah_krama_mipil_id')
                                ->join('tb_penduduk', 'tb_cacah_krama_mipil.penduduk_id', '=', 'tb_penduduk.penduduk_id')
                                ->join('tb_m_profesi', 'tb_penduduk.profesi_id', '=', 'tb_m_profesi.profesi_id')
                                ->where('tb_prajuru_banjar_adat.prajuru_banjar_adat_id', $id)
                                ->first();
        return response()->json($data, 200);    
    }

    public function show_detail_prajuru_banjar_adat_edit($id) {
        $data = DB::table('tb_prajuru_banjar_adat')
                                ->join('tb_m_banjar_adat', 'tb_prajuru_banjar_adat.banjar_adat_id', '=', 'tb_m_banjar_adat.banjar_adat_id')
                                ->join('tb_krama_mipil', 'tb_prajuru_banjar_adat.krama_mipil_id', '=', 'tb_krama_mipil.krama_mipil_id')
                                ->join('tb_cacah_krama_mipil', 'tb_krama_mipil.cacah_krama_mipil_id', '=', 'tb_cacah_krama_mipil.cacah_krama_mipil_id')
                                ->join('tb_penduduk', 'tb_cacah_krama_mipil.penduduk_id', '=', 'tb_penduduk.penduduk_id')
                                ->join('tb_m_profesi', 'tb_penduduk.profesi_id', '=', 'tb_m_profesi.id')
                                ->join('tb_sso', 'tb_sso.penduduk_id', '=', 'tb_cacah_krama_mipil.penduduk_id')
                                ->where('tb_prajuru_banjar_adat.prajuru_banjar_adat_id', $id)
                                ->first();
        return response()->json($data, 200);
    }
    
    public function add_prajuru_desa_adat() {
        Request()->validate([
            'krama_mipil_id' => 'required',
            'status' => 'required',
            'jabatan' => 'required',
            'tanggal_mulai_menjabat' => 'required',
            'tanggal_akhir_menjabat' => 'required',
            'email' => 'required',
            'password' => 'required',
            'desa_adat_id' => 'required',
            'penduduk_id' => 'required',
            'role' => 'required'
        ]);
        $cek_data = PrajuruDesaAdat::where("krama_mipil_id", Request()->krama_mipil_id)->first();
        $cek_email = Pengguna::select('email')->where('email', Request()->email)->first();
        $timestamp = Carbon::now()->toDateTimeString();
        $data_prajuru = [
            'desa_adat_id' => Request()->desa_adat_id,
            'krama_mipil_id' => Request()->krama_mipil_id,
            'jabatan' => Request()->jabatan,
            'status_prajuru_desa_adat' => Request()->status,
            'tanggal_mulai_menjabat' => Request()->tanggal_mulai_menjabat,
            'tanggal_akhir_menjabat' => Request()->tanggal_akhir_menjabat
        ];
        $data_akun = [
            'username' => Str::random(8),
            'email' => Request()->email,
            'password' => Hash::make(Request()->password),
            'role' => Request()->role,
            'penduduk_id' => Request()->penduduk_id,
            'desa_adat_id' => Request()->desa_adat_id,
            'is_verified' => 'Verified',
            'email_verified_at' => $timestamp
        ];
        if($cek_data != null){
            return response()->json([
                'status' => 'Failed',
                'message' => 'Prajuru Sudah Terdaftar Sebelumnya!'
            ], 501);
        }else if($cek_email != null) {
            return response()->json([
                'status' => 'Failed',
                'message' => 'Email Sudah Terdaftar Sebelumnya!'
            ], 502);
        }else{
            if(Request()->status == "0") {
                $this->PrajuruDesaAdat->AddPrajuruDesaAdat($data_prajuru);
                return response()->json([
                    'status' => 'OK',
                    'message' => 'Registrasi Prajuru Desa Adat Baru Berhasil!'
                ], 200);
            }else{
                $this->PrajuruDesaAdat->AddPrajuruDesaAdat($data_prajuru);
                $this->Pengguna->Register($data_akun);
                return response()->json([
                    'status' => 'OK',
                    'message' => 'Registrasi Prajuru Desa Adat Baru Berhasil!'
                ], 200);
            } 
        }
    }

    public function edit_prajuru_desa_adat() {
        Request()->validate([
            "prajuru_desa_adat_id" => 'required',
            "jabatan" => 'required',
            'masa_mulai_menjabat' => 'required',
            'masa_akhir_menjabat' => 'required',
            'email' => 'required',
            'penduduk_id' => 'required',
            'role' => 'required'
        ]);
        $data = [
            "jabatan" => Request()->jabatan,
            "tanggal_mulai_menjabat" => Request()->masa_mulai_menjabat,
            "tanggal_akhir_menjabat" => Request()->masa_akhir_menjabat
        ];
        $data_penduduk = [
            'email' => Request()->email,
            'role' => Request()->role
        ];
        $this->PrajuruDesaAdat->EditPrajuruDesaAdat(Request()->prajuru_desa_adat_id, $data);
        $this->Pengguna->EditData($data_penduduk, Request()->penduduk_id);
        return response()->json([
            'status' => 'OK',
            'message' => 'Data Prajuru Desa Adat berhasil Diperbaharui!'
        ], 200);
    }

    public function delete_prajuru_desa_adat() {
        Request()->validate([
            'prajuru_desa_adat_id' => 'required',
            'penduduk_id' => 'required'
        ]);

        $this->PrajuruDesaAdat->HapusPrajuruDesaAdat(Request()->prajuru_desa_adat_id);
        $this->Pengguna->DeleteAkun(Request()->penduduk_id);
        return response()->json([
            'status' => 'OK',
            'message' => 'Data Prajuru Berhasil Dihapus!'
        ], 200);
    }

    public function add_prajuru_banjar_adat() {
        Request()->validate([
            'krama_mipil_id' => 'required',
            'banjar_id' => 'required',
            'status' => 'required',
            'jabatan' => 'required',
            'tanggal_mulai_menjabat' => 'required',
            'tanggal_akhir_menjabat' => 'required',
            'email' => 'required',
            'password' => 'required',
            'desa_adat_id' => 'required',
            'penduduk_id' => 'required',
            'role' => 'required'
        ]);
        $cek_data = PrajuruBanjarAdat::where("krama_mipil_id", Request()->krama_mipil_id)->first();
        $cek_email = Pengguna::select('email')->where('email', Request()->email)->first();
        $timestamp = Carbon::now()->toDateTimeString();
        $data_prajuru = [
            'krama_mipil_id' => Request()->krama_mipil_id,
            'banjar_adat_id' => Request()->banjar_id,
            'jabatan' => Request()->jabatan,
            'status_prajuru_banjar_adat' => Request()->status,
            'tanggal_mulai_menjabat' => Request()->tanggal_mulai_menjabat,
            'tanggal_akhir_menjabat' => Request()->tanggal_akhir_menjabat
        ];
        $data_akun = [
            'username' => Str::random(8),
            'email' => Request()->email,
            'password' => Hash::make(Request()->password),
            'role' => Request()->role,
            'penduduk_id' => Request()->penduduk_id,
            'desa_adat_id' => Request()->desa_adat_id,
            'is_verified' => 'Verified',
            'email_verified_at' => $timestamp
        ];
        if($cek_data != null){
            return response()->json([
                'status' => 'Failed',
                'message' => 'Prajuru Sudah Terdaftar Sebelumnya!'
            ], 501);
        }else if($cek_email != null) {
            return response()->json([
                'status' => 'Failed',
                'message' => 'Email Sudah Terdaftar Sebelumnya!'
            ], 502);
        }else{
            if(Request()->status == "0") {
                $this->PrajuruBanjarAdat->AddPrajuruBanjarAdat($data_prajuru);
                return response()->json([
                    'status' => 'OK',
                    'message' => 'Registrasi Prajuru Desa Adat Baru Berhasil!'
                ], 200);
            }else{
                $this->PrajuruBanjarAdat->AddPrajuruBanjarAdat($data_prajuru);
                $this->Pengguna->Register($data_akun);
                return response()->json([
                    'status' => 'OK',
                    'message' => 'Registrasi Prajuru Desa Adat Baru Berhasil!'
                ], 200);
            }
        }
    }

    public function edit_prajuru_banjar_adat() {
        Request()->validate([
            'prajuru_banjar_adat_id' => 'required',
            'jabatan' => 'required',
            'masa_mulai_menjabat' => 'required',
            'masa_akhir_menjabat' => 'required',
            'email' => 'required',
            'penduduk_id' => 'required'
        ]);
        $data = [
            "jabatan" => Request()->jabatan,
            "tanggal_mulai_menjabat" => Request()->masa_mulai_menjabat,
            "tanggal_akhir_menjabat" => Request()->masa_akhir_menjabat
        ];
        $data_penduduk = [
            'email' => Request()->email
        ];
        $this->PrajuruBanjarAdat->EditPrajuruBanjarAdat(Request()->prajuru_banjar_adat_id, $data);
        $this->Pengguna->EditData($data_penduduk, Request()->penduduk_id);
        return response()->json([
            'status' => 'OK',
            'message' => 'Data Prajuru Banjar Adat berhasil Diperbaharui!' 
        ], 200);
    }

    public function set_prajuru_banjar_adat_tidak_aktif() {
        Request()->validate([
            'prajuru_banjar_adat_id' => 'required',
            'penduduk_id' => 'required'
        ]);
        $data = [
            'prajuru_banjar_adat_id' => Request()->prajuru_banjar_adat_id,
            'status_prajuru_banjar_adat' => 'tidak aktif'
        ];
        $this->PrajuruBanjarAdat->EditPrajuruBanjarAdat(Request()->prajuru_banjar_adat_id, $data);
        return response()->json([
            'status' => 'OK',
            'message' => 'Atur Status menjadi Tidak Aktif Berhasil!'
        ], 200);
    }

    public function delete_prajuru_banjar_adat() {
        Request()->validate([
            'prajuru_banjar_adat_id' => 'required',
            'penduduk_id' => 'required'
        ]);
        $this->PrajuruBanjarAdat->HapusPrajuruBanjarAdat(Request()->prajuru_banjar_adat_id);
        $this->Pengguna->DeleteAkun(Request()->penduduk_id);
        return response()->json([
            'status' => 'OK',
            'message' => 'Data Prajuru Berhasil Dihapus!'
        ], 200);
    }

    public function show_list_bendesa_adat_by_desa_id($id) {
        $data = PrajuruDesaAdat::join('tb_krama_mipil', 'tb_prajuru_desa_adat.krama_mipil_id', '=', 'tb_krama_mipil.krama_mipil_id')
        ->join('tb_cacah_krama_mipil', 'tb_krama_mipil.cacah_krama_mipil_id', '=', 'tb_cacah_krama_mipil.cacah_krama_mipil_id')
        ->join('tb_penduduk', 'tb_cacah_krama_mipil.penduduk_id', '=', 'tb_penduduk.penduduk_id')
        ->where('tb_prajuru_desa_adat.desa_adat_id', $id)
        ->where('tb_prajuru_desa_adat.status_prajuru_desa_adat', 'aktif')
        ->where('tb_prajuru_desa_adat.jabatan', 'bendesa')
        ->get();

        $data_cek = PrajuruDesaAdat::join('tb_krama_mipil', 'tb_prajuru_desa_adat.krama_mipil_id', '=', 'tb_krama_mipil.krama_mipil_id')
        ->join('tb_cacah_krama_mipil', 'tb_krama_mipil.cacah_krama_mipil_id', '=', 'tb_cacah_krama_mipil.cacah_krama_mipil_id')
        ->join('tb_penduduk', 'tb_cacah_krama_mipil.penduduk_id', '=', 'tb_penduduk.penduduk_id')
        ->where('tb_prajuru_desa_adat.desa_adat_id', $id)
        ->where('tb_prajuru_desa_adat.status_prajuru_desa_adat', 'aktif')
        ->where('tb_prajuru_desa_adat.jabatan', 'bendesa')
        ->first();

        if($data_cek == null) {
            return response()->json([
                'status' => 'Failed',
                'message' => 'Data Bendesa Adat Tidak Ditemukan'
            ], 500);
        }else{
            return response()->json($data, 200);
        }
    }

    public function show_list_penyarikan_by_desa_id($id) {
        $data = PrajuruDesaAdat::join('tb_krama_mipil', 'tb_prajuru_desa_adat.krama_mipil_id', '=', 'tb_krama_mipil.krama_mipil_id')
        ->join('tb_cacah_krama_mipil', 'tb_krama_mipil.cacah_krama_mipil_id', '=', 'tb_cacah_krama_mipil.cacah_krama_mipil_id')
        ->join('tb_penduduk', 'tb_cacah_krama_mipil.penduduk_id', '=', 'tb_penduduk.penduduk_id')
        ->where('tb_prajuru_desa_adat.desa_adat_id', $id)
        ->where('tb_prajuru_desa_adat.status_prajuru_desa_adat', 'aktif')
        ->where('tb_prajuru_desa_adat.jabatan', 'penyarikan')
        ->get();

        $data_cek = PrajuruDesaAdat::join('tb_krama_mipil', 'tb_prajuru_desa_adat.krama_mipil_id', '=', 'tb_krama_mipil.krama_mipil_id')
        ->join('tb_cacah_krama_mipil', 'tb_krama_mipil.cacah_krama_mipil_id', '=', 'tb_cacah_krama_mipil.cacah_krama_mipil_id')
        ->join('tb_penduduk', 'tb_cacah_krama_mipil.penduduk_id', '=', 'tb_penduduk.penduduk_id')
        ->where('tb_prajuru_desa_adat.desa_adat_id', $id)
        ->where('tb_prajuru_desa_adat.status_prajuru_desa_adat', 'aktif')
        ->where('tb_prajuru_desa_adat.jabatan', 'penyarikan')
        ->first();

        if($data_cek == null) {
            return response()->json([
                'status' => 'Failed',
                'message' => 'Data Penyarikan Tidak Ditemukan!'
            ], 500);
        }else{
            return response()->json($data, 200);
        }
    }
}