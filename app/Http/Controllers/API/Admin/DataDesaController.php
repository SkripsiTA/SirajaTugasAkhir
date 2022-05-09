<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DesaAdat;

class DataDesaController extends Controller
{
    public function __construct() {
        $this->DesaAdat = new DesaAdat();
    }

    public function up_sejarah_desa() {
        Request()->validate([
            'desa_id' => 'required',
            'sejarah_desa' => 'required'
        ]);
        $data = [
            'desadat_sejarah' => Request()->sejarah_desa
        ];
        $this->DesaAdat->UpSejarahDesaAdat(Request()->desa_id, $data);
        return response()->json([
            'status' => 'OK',
            'message' => 'Data Sejarah Desa Berhasil Diperbaharui!'
        ], 200);
    }
}
