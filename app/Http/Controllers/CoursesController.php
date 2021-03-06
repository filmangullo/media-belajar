<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Instansi;
use App\KelasMataPelajaran;
use App\Participant;
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
        return view ('webs.courses.courses', [
            'kelas' => $query
        ]);
    }

    /**
     * create the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $instansis = Instansi::all();
        return view('webs.courses.create', [
            'instansis' => $instansis
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

        $store->instansi_id = $request->instansi;
        $store->user_id     = Auth::user()->id;
        $store->nama        = $request->nama;
        $store->keterangan  = $request->keterangan;
        $store->enroll_key  = $request->enroll_key;
        $store->type        = $request->type;
        $store->is_active   = true;
        if($store->save()) {
          $siswa = new Participant();

          $siswa->kelas_mata_pelajarans_id = $store->id;
          $siswa->user_id                  = Auth::user()->id;

          if($siswa->save()) {
            return redirect()->route('show.courses', $store->id);
          }
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
        $query = KelasMataPelajaran::findorFail($id)->delete();

        return redirect()->route('index.courses')
                         ->with('delete','Anda telah berhasil menghapus Data');
    }

    /**
     * Create the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function enrollCreate($id)
    {
        return view('webs.courses.enroll', [
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
        if(Auth::user()->role == 'user') {
            return redirect()->back()->with(['errors'=>'Status anda masih User biasa, Anda belum menjadi Siswa atau Guru.']);
        } else {
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

            return view ('webs.forum.forum', [
                'kelas' => $kelas,
                'forum' => $forum
            ]);
        }

    }
}
