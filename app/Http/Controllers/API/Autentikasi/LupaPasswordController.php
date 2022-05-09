<?php

namespace App\Http\Controllers\API\Autentikasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengguna;
use Illuminate\Support\Facades\Hash;

class LupaPasswordController extends Controller
{
    public function __construct() {
        $this->Pengguna = new Pengguna;
    }
    public function cek_email() {
        Request()->validate([
            'email' => 'required'
        ]);
        $cek_email = Pengguna::select('email')->where('email', Request()->email)->first();
        if($cek_email != null) {
            return response()->json([
                'status' => 'OK',
                'messages' => 'Email pengguna ditemukan'
            ], 200);
        }else{
            return response()->json([
                'status' => 'Failed',
                'messages' => 'Email pengguna tidak ditemukan'
            ], 500);
        }
    }

    public function show_forget_password_page($email) {
        $cek_email = Pengguna::select('email')->where('email', $email)->first();
        $dataemail = [];
        if($cek_email != null) {
            $dataemail = [
                'email' => $email
            ];
            return view('forgetpassword', compact('cek_email'));
        }else{
            return view('emailnotfound');
        }
    }

    public function reset_password($email) {
        Request()->validate([
            'password' => 'required',
            'confirm_password' => 'required'
        ], [
            'password.required' => 'Password baru belum terisi',
            'confirm_password.required' => 'Konfirmasi password belum terisi'
        ]);

        $data = [
            'password' => Hash::make(Request()->password)
        ];

        $this->Pengguna->ResetPassword($data, $email);
        return view('resetpasssuccess');
    }
}