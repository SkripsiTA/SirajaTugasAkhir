<?php

namespace App\Http\Controllers\API\Data;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use App\Models\Pengguna;
use App\Models\Penduduk;
use App\Models\DesaAdat;

class UserDataController extends Controller
{
    public function __construct() {
        $this->Penduduk = new Penduduk();
        $this->Pengguna = new Pengguna();
        $this->DesaAdat = new DesaAdat();
    }

    public function show_user_data($id) {
        $data = Penduduk::join('tb_sso', 'tb_sso.penduduk_id', '=', 'tb_penduduk.penduduk_id')
                        ->join('tb_cacah_krama_mipil', 'tb_cacah_krama_mipil.penduduk_id', '=', 'tb_penduduk.penduduk_id')
                        ->join('tb_krama_mipil', 'tb_krama_mipil.cacah_krama_mipil_id', '=', 'tb_cacah_krama_mipil.cacah_krama_mipil_id')
                        ->join('tb_m_banjar_adat', 'tb_krama_mipil.banjar_adat_id', '=', 'tb_m_banjar_adat.banjar_adat_id')
                        ->join('tb_m_desa_adat', 'tb_m_banjar_adat.desa_adat_id', '=', 'tb_m_desa_adat.desa_adat_id')
                        ->join('tb_m_profesi', 'tb_m_profesi.profesi_id', '=', 'tb_penduduk.profesi_id')
                        ->where('tb_sso.user_id', $id)
                        ->first();
        return response()->json($data, 200);
    }

    public function edit_profile() {
        Request()->validate([
            'user_id' => 'required',
            'username' => 'required',
            'password' => 'required',
            'password_sekarang' => 'required'
        ]);
        $data_user = [
            'username' => Request()->username,
            'password' => Hash::make(Request()->password),
        ];
        $username_pengguna = Pengguna::select()->where('user_id', Request()->user_id)->first();
        $data_username = json_decode($username_pengguna);
        $cek_username = Pengguna::select('username')->where('username', Request()->username)->first();
        if(Hash::check(Request()->password_sekarang, $data_username->password)) {
            if($data_username->username == Request()->username) {
                $this->Pengguna->EditProfile($data_user, Request()->user_id);
                return response()->json([
                    'status' => 'Success',
                    'message' => 'Profil Berhasil Diubah!'
                ], 200);
            }else{
                if($cek_username != null) {
                    return response()->json([
                        'status' => 'Failed',
                        'message' => 'Username sudah terdaftar sebelumnya'
                    ], 501);
                }else{
                    $this->Pengguna->EditProfile($data_user, Request()->user_id);
                    return response()->json([
                        'status' => 'Success',
                        'message' => 'Profil Berhasil Diubah!'
                    ], 200);
                }
                
            }
        }else{
            return response()->json([
                'status' => 'Failed',
                'message' => 'Password Salah!'
            ], 502);
        }
    }

    public function show_data_desa_by_id($id) {
        $data = DesaAdat::join('tb_m_kecamatan', 'tb_m_kecamatan.kecamatan_id', '=', 'tb_m_desa_adat.kecamatan_id')
                        ->where('tb_m_desa_adat.desa_adat_id', $id)
                        ->first();
        return response()->json($data, 200);
    }
}