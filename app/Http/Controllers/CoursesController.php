<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KelasMataPelajaran;
use App\Participant;
use Illuminate\Support\Facades\Auth;
use App\Forum;

class CoursesController extends Controller
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
    public function index()
    {
        $query = KelasMataPelajaran::all();
        return view ('webs.courses', [
            'kelas' => $query
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function enrollCreate($id)
    {
        return view('webs.courses_enroll', [
            'parameterKey' => $id,
            'data'         => KelasMataPelajaran::findOrFail($id)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function enrollStore(Request $request)
    {
        $kelas = KelasMataPelajaran::findOrFail($request->id_pelajaran);
        if ($request->enroll_key == $kelas->enroll_key) {
            $siswa = new Participant();

            $siswa->kelas_mata_pelajarans_id = $request->id_pelajaran;
            $siswa->user_id                  = Auth::user()->id;
            if($siswa->save()) {
                return redirect()->route('show.courses',$request->id_pelajaran );
            }
        } else {
            return redirect()->back()->withInput();
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

            return view ('webs.courses_show', [
                'kelas' => $kelas,
                'forum' => $forum
            ]);
        }

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

    ////////////////////////////////////////////////////////////////// FORUM CONTROLLER
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showForum($id) {
        return view('webs.courses_forum');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createForum($id) {
        return view('webs.courses_forum_create', [
            'id'    => $id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeForum(Request $request, $id) {
        $store = new Forum;
        $store->kelas_mata_pelajarans_id = $id;
        $store->nama = $request->nama;
        if($store->save()) {
            return redirect()->route('show.courses',  $id );
        }
    }


}
