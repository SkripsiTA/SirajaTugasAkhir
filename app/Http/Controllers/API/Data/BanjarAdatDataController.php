<?php

namespace App\Http\Controllers\API\Data;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BanjarAdat;

class BanjarAdatDataController extends Controller
{
    public function __construct() {
        $this->BanjarAdat = new BanjarAdat();
    }

    public function show_list_banjar_adat_by_desa_id($id) {
        $data = BanjarAdat::select('banjar_adat_id', 'nama_banjar_adat')
                            ->where('desa_adat_id', $id)
                            ->get();
        return response()->json($data, 200);
    }
}
