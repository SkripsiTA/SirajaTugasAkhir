<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\DesaAdat;
use App\Models\KramaMipil;
use Illuminate\Http\Request;
use App\Models\PrajuruDesaAdat;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class DashboardSuperadminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $desaadatpending = DesaAdat::with(['kecamatan', 'user'])->where('desadat_status_register', 'Pending')->paginate(10);
        $desaadatverif = DesaAdat::with(['kecamatan', 'user'])->where('desadat_status_register', 'Terdaftar')->paginate(10);
        $desaadattolak = DesaAdat::with(['kecamatan', 'user'])->where('desadat_status_register', 'Tolak')->paginate(10);

        // $staff = Staff::with('desa')->get();

        return view('superadmin.dashboard.home-superadmin', compact('desaadatpending', 'desaadatverif', 'desaadattolak'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $desaadatdetail = DesaAdat::with(['kecamatan', 'user', 'prajurudesaadat'])->findOrFail($id);

        return view('superadmin.dashboard.detail-desa', compact('desaadatdetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $desaadatpending = DesaAdat::with(['kecamatan', 'user', 'prajurudesaadat'])->findOrFail($id);

        return view('superadmin.dashboard.konfirmasi-desa', compact('desaadatpending'));
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
        $desaadatpending = DesaAdat::with(['kecamatan', 'user', 'prajurudesaadat'])->findOrFail($id);
        $desaadatpending->desadat_status_register = 'Terdaftar';
        $desaadatpending->save();

        $prajurudesaakun = new User;
        $prajurudesaakun->desa_adat_id = $desaadatpending->desa_adat_id;
        $pendudukid = KramaMipil::with('cacahkramamipil.penduduk')->findOrFail($desaadatpending->prajurudesaadat[0]->krama_mipil_id);
        $prajurudesaakun->penduduk_id = $pendudukid->cacahkramamipil->penduduk->penduduk_id;
        $prajurudesaakun->email = $desaadatpending->desadat_email;
        $prajurudesaakun->password = Hash::make($desaadatpending->desadat_nama);
        $prajurudesaakun->role = 'Bendesa';
        $prajurudesaakun->save();

        return redirect()->route('superadmin')->with('success', 'Data berhasil disimpan!');

    }

    public function tolak(Request $request, $id)
    {
        $desaadatpending = DesaAdat::with(['kecamatan', 'user', 'prajurudesaadat'])->findOrFail($id);
        dd($desaadatpending);
        // $desaadatpending->desadat_status_register = 'Tolak';
        // $desaadatpending->desadat_keterangan =
        // $desaadatpending->save();

        return redirect()->route('superadmin')->with('success', 'Data berhasil disimpan!');
    }

    public function destroy($id)
    {
        //
    }
}
