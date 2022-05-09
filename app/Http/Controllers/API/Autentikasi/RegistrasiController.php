<?php

namespace App\Http\Controllers\API\Autentikasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Penduduk;
use App\Models\Pengguna;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class RegistrasiController extends Controller
{
    public function __construct() {
        $this->Penduduk = new Penduduk;
        $this->Pengguna = new Pengguna;
    }

    public function cek_nik_penduduk() {
        Request()->validate([
            'nik' => 'required'
        ]);
        $hasil = Penduduk::join('tb_cacah_krama_mipil', 'tb_cacah_krama_mipil.penduduk_id', '=', 'tb_penduduk.penduduk_id')
                            ->join('tb_krama_mipil', 'tb_krama_mipil.cacah_krama_mipil_id', '=', 'tb_cacah_krama_mipil.cacah_krama_mipil_id')
                            ->join('tb_m_banjar_adat', 'tb_krama_mipil.banjar_adat_id', '=', 'tb_m_banjar_adat.banjar_adat_id')
                            ->join('tb_m_desa_adat', 'tb_m_banjar_adat.desa_adat_id', '=', 'tb_m_desa_adat.desa_adat_id')
                            ->where('tb_penduduk.nik', Request()->nik)
                            ->first();
        if($hasil == null) {
            return response()->json([
                'status' => 'Failed',
                'message' => 'Data penduduk tidak ditemukan'
            ], 500);
        }else{
            return response()->json($hasil, 200);
        }
    }

    public function proses_registrasi() {
        Request()->validate([
            'username' => 'required',
            'nomor_telepon' => 'required',
            'email' => 'required',
            'password' => 'required',
            'desa_id' => 'required',
            'penduduk_id' => 'required'
        ]);
        $cek_email = Pengguna::select('email')->where('email', Request()->email)->first();
        $cek_nomor_telepon = Pengguna::select('nomor_telepon')->where('nomor_telepon', Request()->nomor_telepon)->first();
        $cek_username = Pengguna::select('username')->where('username', Request()->username)->first();
        $data = [
            'username' => Request()->username,
            'email' => Request()->email,
            'password' => Hash::make(Request()->password),
            'nomor_telepon' => Request()->nomor_telepon,
            'role' => 'Krama',
            'penduduk_id' => Request()->penduduk_id,
            'desa_adat_id' => Request()->desa_id,
            'is_verified' => "Not Verified"
        ];
        if($cek_email != null || $cek_nomor_telepon != null || $cek_username != null) {
            return response()->json([
                'status' => 'Failed',
                'message' => 'Email, nomor telepon atau username sudah terdaftar sebelumnya'
            ], 501);
        }else{
            $this->Pengguna->Register($data);
            return response()->json([
                'status' => 'OK',
                'message' => 'Registrasi Akun Berhasil'
            ], 200);
        }
    }
}
