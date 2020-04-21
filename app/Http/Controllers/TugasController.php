<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Forum;
use App\ForumTugas;
use App\ForumTugasKumpul;

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

      return view('webs.tugas.tugas', [
          'forum'       => $forum,
          'tugas'       => $tugas
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
      dd ($request->all());

  }
}
