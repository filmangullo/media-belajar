<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\Forum;
use App\ForumTugas;
use App\ForumTugasKumpul;
use Auth;


class TugasController extends Controller
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

      $forum = Forum::where('id', $id)
                    ->first();

      $tugas = ForumTugas::where('forum_id', $id)
                         ->orderBy('id', 'ASC')
                         ->get();
      $tugasKumpul = "";

      $tugasKumpulCek = ForumTugasKumpul::where('forum_id', $forum->id)
                                        ->where('user_id', Auth::user()->id)
                                        ->first();

      if(!$tugasKumpulCek != true ) {
          $tugasKumpul = $tugasKumpulCek->tugas;
      }

      return view('webs.tugas.tugas', [
          'forum'       => $forum,
          'tugas'       => $tugas,
          'tugasKumpul' => $tugasKumpul
      ]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request, $id)
  {  
    $query = new ForumTugasKumpul;
    if ($request->file('file') == null ) {
        $query->forum_id        = $id;
        $query->user_id         = Auth::user()->id;
        $query->tugas           = $request->tugas;
    } else {
        $path = Storage::putFile('public', $request->file('file'));
        $query->forum_id        = $id;
        $query->user_id         = Auth::user()->id;
        $query->tugas           = $request->tugas;
        $query->file            = substr($path,7);
        $query->extension_file  = $request->file('file')->getClientOriginalExtension();
    }
      if($query->save()) {
        return redirect()->route('index.tugas', $id);
      }
  }

}
