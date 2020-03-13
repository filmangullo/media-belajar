<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Forum;
use App\Participant;
use App\KelasMataPelajaran;

class ForumController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $cek = Participant::where('kelas_mata_pelajarans_id', $id)
                            ->where('user_id', Auth::user()->id )
                            ->count();

        if (!$cek == true) {
            return redirect()->route('enroll.courses', ['parameterKey' => $id ]);
        } else if (!$cek == false) {
            $kelas = KelasMataPelajaran::where('id', $id)
                                        ->first();
            $forum = Forum::where('kelas_mata_pelajarans_id', $kelas->id)
                          ->get();

            return view ('webs.forum.forum', [
                'kelas' => $kelas,
                'forum' => $forum
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('webs.forum.forum_create', [
            'id'    => $id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id) {
        $store = new Forum;
        $store->kelas_mata_pelajarans_id = $id;
        $store->nama = $request->nama;
        if($store->save()) {
            return redirect()->route('show.courses',  $id );
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
