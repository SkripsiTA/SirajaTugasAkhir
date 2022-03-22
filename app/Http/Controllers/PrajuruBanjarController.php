<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\KramaMipil;
use Illuminate\Http\Request;
use App\Models\PrajuruBanjarAdat;
use Illuminate\Support\Facades\Auth;
use App\Models\BanjarAdat;

class PrajuruBanjarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $prajurubanjar = PrajuruBanjarAdat::with(['banjaradat','kramamipil'])->paginate(10);

        // dd($prajurubanjar);

        return view('admin.masterdata.banjar.prajuru-banjar', compact('prajurubanjar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prajurubanjar = PrajuruBanjarAdat::first();
        $banjaradat = BanjarAdat::with('desaadat')->get();
        $kramamipil = KramaMipil::with(['banjaradat', 'cacahkramamipil'])->get();
        $akun = User::with(['penduduk','desaadat'])->first();

        return view('admin.masterdata.banjar.add-prajuru-banjar', compact('prajurubanjar', 'banjaradat', 'kramamipil', 'akun'));
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
