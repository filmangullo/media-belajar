<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Instansi;
use App\KelasMataPelajaran;

class KelasMataPelajaranController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $instansis = Instansi::where('id', $id)
                             ->first();

        $kelasMataPelajarans = KelasMataPelajaran::where('instansi_id', $id)
                                                 ->get();

        return view('admins.kelas_mata_pelajaran', [
            'instansis' => $instansis,
            'kelasMataPelajarans' => $kelasMataPelajarans
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $instansis = Instansi::where('id', $id)
                             ->first();
        return view('admins.kelas_mata_pelajaran_create', [
            'instansis' => $instansis,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $store = new KelasMataPelajaran();

        $store->instansi_id = $request->instansi_id;
        $store->nama = $request->nama;
        $store->keterangan = $request->keterangan;
        $store->enroll_key = $request->enroll_key;
        $store->is_active = true;
        $store->save();

        return redirect()->route('adm.kelasmatapelajaran.index', $request->instansi_id);
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
