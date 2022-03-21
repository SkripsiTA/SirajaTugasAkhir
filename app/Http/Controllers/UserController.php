<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.dashboard.profile');
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
        $profile = User::with(['penduduk','desaadat'])->findOrFail($id);
        // dd($profile);

        return view('profile.profile', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile = User::with(['penduduk','desaadat'])->findOrFail($id);
        // dd($profile);

        return view('profile.edit-profile', compact('profile'));
    }

    public function crop(Request $request)
    {
        $path="assets/img/profile/";

        $foto = $request->file('foto_user');
        $foto_baru = 'UIMG'.date('YmdHis').uniqid().'.jpg';

        //Upload Foto
        $move = $foto->move(public_path($path), $foto_baru);

        if (!$move) {
            return response()->json(['status'=>0, 'msg'=>'Terjadi kesalahan menggunggah data!']);
        }else {
            $userInfo = User::where('user_id','=', session('LoggedUser'))->first();
            $userFoto = $userInfo->foto;
            if (!$userFoto !='') {
                unlink($path.$userFoto);
            }

            User::where('user_id', session('LoggedUser'))->update(['foto'=>$foto_baru]);
            return response()->json(['status'=>1, 'msg'=>'Profile berhasil diubah!','username'=>$foto_baru]);

        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'foto_user' => 'required|mimes:jpeg,jpg,png|max:1024',
        ]);

        $profile = User::with(['penduduk','desaadat'])->findOrFail($id);

        if($request->hasFile('foto_user')) {
            $file = $request->file('foto_user');
            $filename = time().'.'.$file->getClientOriginalExtension();

            $file->move('assets/img/profile/', $filename);

            File::delete('assets/img/profile/'. $profile->foto);

            //Jika mengganti password
            if($profile->password != $request->password) {
                $profile->update([
                    'username' => $request->username,
                    'nomor_telepon' => $request->nomor_telepon,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'foto' => $filename
                ]);
            } else {
            //jika user tidak mengganti password
                $profile->update([
                    'username' => $request->username,
                    'nomor_telepon' => $request->nomor_telepon,
                    'email' => $request->email,
                    'password' => $request->password,
                    'foto' => $filename
                ]);
            }

        }

        return redirect()->route('show-profile', $profile->user_id)->with(['toast_success' => 'Data Berhasil Diupdate!']);;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
