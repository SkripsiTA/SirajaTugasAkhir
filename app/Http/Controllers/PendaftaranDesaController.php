<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\DesaAdat;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\KramaMipil;
use Illuminate\Http\Request;
use App\Models\PrajuruDesaAdat;
use Facade\FlareClient\Stacktrace\File;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class PendaftaranDesaController extends Controller
{
    public function create()
    {
        $provinsi = Provinsi::find(51);
        // $kramamipil = KramaMipil::first();
        $kramamipil = KramaMipil::with(['banjaradat', 'cacahkramamipil'])->get();
        $desaadat = DesaAdat::first();

        return view('auth.daftar-desa', compact('provinsi', 'kramamipil', 'desaadat'));
    }

    public function getkabupaten(Request $request)
    {
        $provinsi_id = $request->provinsi_id;

        $options = "<option>-- Pilih Kabupaten --</option>";
        $kabupatens = Kabupaten::where('provinsi_id',$provinsi_id)->get();
        foreach ($kabupatens as $kabupaten){
            $options .= "<option value='$kabupaten->kabupaten_id'>$kabupaten->name</option>";
        }

        echo $options;
    }

    public function getkecamatan(Request $request)
    {
        $kabupaten_id = $request->kabupaten_id;

        $options = "<option>-- Pilih Kecamatan --</option>";
        $kecamatans = Kecamatan::where('kabupaten_id',$kabupaten_id)->get();
        foreach ($kecamatans as $kecamatan){
            $options .= "<option value='$kecamatan->kecamatan_id'>$kecamatan->name</option>";
        }

        echo $options;
    }

    public function getdesaadat(Request $request)
    {
        $kecamatan_id = $request->kecamatan_id;

        $options = "<option>-- Pilih Desa Adat --</option>";
        $desas = DesaAdat::where('kecamatan_id',$kecamatan_id)->get();
        foreach ($desas as $desa){
            $options .= "<option value='$desa->desa_adat_id'>$desa->desadat_nama</option>";
        }

        echo $options;
    }

    public function loaddata(Request $request)
    {
        $search = $request->nomor_krama_mipil;

        // $staff = Staff::with(['jabatan','unit','penduduk','desa'])->get();
        // $penduduk = Penduduk::all();

        // $search = !empty($request->cari) ? ($request->cari) : ('');

        // if($search == ''){
        //     $penduduks = Penduduk::orderby('nama_lengkap', 'asc')->select('penduduk_id', 'nama_lengkap')->limit(5)->get();
        // } else {
        //     $penduduks = Penduduk::orderby('nama_lengkap', 'asc')->select('penduduk_id', 'nama_lengkap')->where('penduduk_id', 'like', '%' .$search . '%')->limit(5)->get();
        // }


        $penduduks = KramaMipil::with(['cacahkramamipil', 'banjaradat'])->where('nomor_krama_mipil','like','%' .$search .'%')->get();

        // $namapenduduk => $penduduks->cacahkramamipil->penduduk->nama;

        // $response = array();
        // foreach ($penduduks as $penduduk) {
        //     $response[] = array(
        //         'penduduk_id' => $penduduk->penduduk_id,
        //         'nama_lengkap' => $penduduk->nama_lengkap,
        //     );
        // }

        return response()->json($penduduks);

    }

    public function save(Request $request)
    {

        $id = IdGenerator::generate(['table' => 'tb_m_desa_adat', 'field' =>'desadat_nomor_register' ,'length' => 17, 'prefix' => "DS-ADAT".date('dmy')]);

        // dd($request->all());
        $this->validate($request, [
                'file_struktur_pem' => 'required|mimes:jpeg,jpg,pdf|max:3072',
                'logo_desa' => 'required|mimes:jpeg,jpg,png|max:1024',
            ]);
        // $desa = DesaAdat::findOrFail($request->desa);
        // dd($struktur);


        $struktur = $request->file('file_struktur_pem');
        $filename = time().'.'.$struktur->getClientOriginalExtension();
        $struktur->move('assets/img/struktur-desa/', $filename);

        $logo = $request->file('logo_desa');
        $filenames = time().'.'.$logo->getClientOriginalExtension();
        $logo->move('assets/img/logo-desa/', $filenames);

        $desaadat = DesaAdat::findOrFail($request->desa);
        $desaadat->desadat_nomor_register = $id;
        $desaadat->desa_adat_id = $request->desa;
        $desaadat->kecamatan_id = $request->kecamatan;
        $desaadat->desadat_kode_surat = $request->kode_nomor_surat;
        $desaadat->desadat_kode_pos = $request->kode_pos;
        $desaadat->desadat_status_aktif = $request->status_desa;
        $desaadat->desadat_alamat_kantor = $request->alamat_desa;
        $desaadat->desadat_telpon_kantor = $request->telepon_desa;
        $desaadat->desadat_wa_kontak_1 = $request->kontak_wa;
        $desaadat->desadat_fax_kantor = $request->fax_desa;
        $desaadat->desadat_email = $request->email_desa;
        $desaadat->desadat_web = $request->web_desa;
        $desaadat->desadat_luas = $request->luas_desa;
        $desaadat->desadat_sejarah = $request->sejarah_desa;
        $desaadat->desadat_sebutan_pemimpin = $request->sebutan_pemimpin;
        $desaadat->desadat_file_struktur_pem = $filename;
        $desaadat->desadat_logo = $filenames;
        $desaadat->desadat_status_register = 'Pending';
        $desaadat->save();

        $prajurudesaadat = new PrajuruDesaAdat;
        $prajurudesaadat->desa_adat_id = $desaadat->desa_adat_id;
        $prajurudesaadat->krama_mipil_id = $request->kramamipil_id;
        $prajurudesaadat->jabatan = 'bendesa';
        $prajurudesaadat->status_prajuru_desa_adat = 'aktif';
        $prajurudesaadat->tanggal_mulai_menjabat = $request->masa_mulai;
        $prajurudesaadat->tanggal_akhir_menjabat = $request->masa_berakhir;
        $prajurudesaadat->save();

        // dd($request->all());

        return redirect()->route('daftar-desa-sukses')->with('success', 'Data berhasil ditambahkan!');
    }

    public function success()
    {
        return view('auth.daftar-desa-sukses');
    }

}
