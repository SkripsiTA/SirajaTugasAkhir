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
    public function search(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');
            if ($query != '') {
                $data = DesaAdat::with(['kecamatan', 'user'])
                    ->where('desa_adat_id', 'like', '%'.$query.'%')
                    ->orWhere('desadat_nama', 'like', '%'.$query.'%')
                    ->orWhere('kecamatan.name', 'like', '%'.$query.'%')
                    ->orWhere('desadat_status_aktif', 'like', '%'.$query.'%')
                    ->orWhere('desadat_nomor_register', 'like', '%'.$query.'%')
                    ->orWhere('desadat_email', 'like', '%'.$query.'%')
                    ->orderBy('desa_adat_id', 'desc')
                    ->get();
            } else {
                $data  = DesaAdat::with(['kecamatan', 'user'])
                    ->orderBy('desa_adat_id', 'desc')
                    ->get();
            }
            $total_data = $data->count();
            if ($total_data > 0) {
                foreach ($data as $row) {
                    $output .= '
                    <tr>
                        <td>'.$data->firstItem()+$row.'</td>
                        <td>'.$row->desa_adat_id.'</td>
                        <th scope="row">'.$row->desadat_nama.'</th>
                        <td>'.$row->kecamatan->name.'</td>
                        <td>'.$row->kecamatan->kabupaten->name.'</td>
                        <td>
                            @if ('.$row->desadat_status_aktif.' == "1")
                            <span class="right badge badge-info">Aktif</span>
                            @else
                            <span class="right badge badge-secondary">Tidak Aktif</span>
                            @endif
                        </td>
                        <td>'.$row->desadat_nomor_register.'</td>
                        <td>
                            <span class="right badge badge-warning">'.$row->desadat_status_register.'</span>
                        </td>
                        <td>'.$row->desadat_email.'</td>

                    </tr>
                    ';
                }
            } else {
                $output = '
                    <tr>
                        <td align="center" colspan="5">Data Tidak Ditemukan</td>
                    </tr>
                ';
            }
            $data = array(
                'table_data' => $output,
                'total' => $total_data,
            );

            echo json_encode($data);
        }
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
        $prajurudesaakun->nomor_telepon = $desaadatpending->desadat_wa_kontak_1;
        $prajurudesaakun->password = Hash::make($desaadatpending->desadat_nama);
        $prajurudesaakun->role = 'Bendesa';
        $prajurudesaakun->save();

        return redirect()->route('superadmin')->with('success', 'Data berhasil disimpan!');

    }

    public function tolak(Request $request)
    {
        $desaadatpending = DesaAdat::with(['kecamatan', 'user', 'prajurudesaadat'])->where('desa_adat_id', $request->desa_adat_id)->first();

        $desaadatpending->desadat_status_register = 'Tolak';
        $desaadatpending->desadat_keterangan = $request->desadat_keterangan;
        $desaadatpending->save();
        // dd($desaadatpending);

        return redirect()->route('superadmin')->with('success', 'Data berhasil disimpan!');
    }

    public function showtolak($id)
    {
        $desaadatdetail = DesaAdat::with(['kecamatan', 'user', 'prajurudesaadat'])->findOrFail($id);

        return view('superadmin.dashboard.detail-desa-tolak', compact('desaadatdetail'));
    }
}
