<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\ForumTugasKumpul;
use App\Forum;

class TugasPelajarController extends Controller
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
        $resultsx = [];
        $forum = Forum::where('id', $id)->firstOrFail();
        $tugasKumpul = ForumTugasKumpul::where('forum_id', $id)->get();

        foreach ( $forum->kelasmatapelajarans->participants ?: [] as $key => $participant ) 
        {
            $tgl_upload = 'belum_upload';
            $tgs_nilai  = 0;
            $id_tugas   = null;

            foreach ( $tugasKumpul as $tugas) {
                if ($tugas->users['id'] == $participant->users->id) {
                    $id_tugas   = $tugas->id;
                    $tgs_nilai  = $tugas->nilai ;
                    $tgl_upload = date_format($tugas->created_at, "F d, Y H:i" ) ;
                }
            }

            $resultsx[] = [
                'id_tugas'      => $id_tugas,
                'nama'          => $participant->users->name,
                'email'         => $participant->users->email,
                'level'         => $participant->users->role,
                'tgl_upload'    => $tgl_upload,
                'tgs_nilai'     => $tgs_nilai
            ];
            

        }


        return view('webs.tugas.tugas_pelajar', [
            'forum'           => $forum,
            'results'         => $resultsx
        ]);
  }

  public function show($id) {
        $tugasKumpul = ForumTugasKumpul::findOrFail($id);

        $forum = Forum::where('id', $tugasKumpul->forum_id)
                    ->first();
        return view('webs.tugas.tugas_pelajar_show', [
            'forum'           => $forum,
            'tugasKumpul'     => $tugasKumpul
        ]);
  }

  public function download($id)
  {
        $query = ForumTugasKumpul::findOrFail($id);

        return response()->download(storage_path('app/public/' . $query->file));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function nilai(Request $request, $id)
  {  
    $query = ForumTugasKumpul::findOrFail($id);

    $query->nilai               = $request->nilai;
    $query->catatan_pengajar    = $request->catatan_pengajar;

    if ($query->save()) {
        return redirect()->back()->with('success','Berhasi di update');
    }
  }
}
