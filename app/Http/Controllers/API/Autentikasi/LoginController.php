<?php

namespace App\Http\Controllers\API\Autentikasi;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PrajuruBanjarAdat;
use App\Models\PrajuruDesaAdat;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{

    public function __construct() {
        $this->User = new User;
        $this->PrajuruBanjarAdat = new PrajuruBanjarAdat();
        $this->PrajuruDesaAdat = new PrajuruDesaAdat();
    }

    public function login(){
        Request()->validate(
            [
                'email' => 'required',
                'password' => 'required'
            ]
        );
        $password = User::select('password')->where('email', Request()->email)->first();
        $data_pengguna = User::select()
                                ->join('tb_m_desa_adat', 'tb_m_desa_adat.desa_adat_id', '=', 'tb_sso.desa_adat_id')
                                ->where('email', Request()->email)
                                ->first();
        $password_decode = json_decode($password);
        return response()->json($password_decode);
        // if($password != ""){
        //     if(Hash::check(Request()->password, $password_decode->password)) {
        //         return response()->json($data_pengguna, 200);
        //     } else {
        //         return response()->json([
        //             'status' => 'Failed',
        //             'message' => 'Password salah'
        //         ], 500) ;
        //     }
        // } else {
        //     return response()->json([
        //         'status' => 'Failed',
        //         'message' => 'Email salah'
        //     ], 500);
        // }
    }

    public function cek_status_admin($id) {
        $data = DB::table('tb_prajuru_desa_adat')
                ->join('tb_krama_mipil', 'tb_prajuru_desa_adat.krama_mipil_id', '=', 'tb_krama_mipil.krama_mipil_id')
                ->join('tb_cacah_krama_mipil', 'tb_krama_mipil.cacah_krama_mipil_id', '=', 'tb_cacah_krama_mipil.cacah_krama_mipil_id')
                ->join('tb_penduduk', 'tb_cacah_krama_mipil.penduduk_id', '=', 'tb_penduduk.penduduk_id')
                ->where('tb_penduduk.penduduk_id', $id)
                ->first();
        return response()->json($data, 200);
    }
}
