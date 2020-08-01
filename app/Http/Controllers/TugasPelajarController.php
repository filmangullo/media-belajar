<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Forum;
use App\ForumTugasKumpul;

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
      $forum = Forum::where('id', $id)
                    ->first();

      $tugasKumpul = ForumTugasKumpul::where('forum_id', $id)
                                     ->get();

      return view('webs.tugas.tugas_pelajar', [
          'forum'           => $forum,
          'tugasKumpul'     => $tugasKumpul
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

        return response()->download(storage_path('app/' . $query->file));
  }
}
