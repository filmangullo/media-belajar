<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Instansi;
use App\KelasMataPelajaran;
use App\Forum;

class ForumController extends Controller
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
        $kelasMataPelajarans = KelasMataPelajaran::where('id', $id)
                                ->first();
        $forum = Forum::where('kelas_mata_pelajarans_id', $id)
                      ->get();
        return view('admins.forum', [
            'kelasMataPelajarans' => $kelasMataPelajarans,
            'forum'               => $forum
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $kelasMataPelajarans = KelasMataPelajaran::where('id', $id)
                                ->first();
        return view('admins.forum_create', [
            'kelasMataPelajarans' => $kelasMataPelajarans
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
        $store = new Forum;
        $store->kelas_mata_pelajarans_id = $request->kelas_mata_pelajarans_id;
        $store->nama = $request->nama;
        if($store->save()) {
            return redirect()->route('adm.forum.index',  $store->kelas_mata_pelajarans_id );
        }

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
