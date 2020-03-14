<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ForumDiskusi;
use Auth;

class ForumDiskusiController extends Controller
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
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create($id)
  {
      return view('webs.pertemuan.deskripsi',[
        'forum_id'  => $id
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
    $query = new ForumDiskusi;

    $query->forum_id = $id;
    $query->user_id = Auth::user()->id;
    $query->diskusi = $request->diskusi;

    if($query->save()) {
      return redirect()->route('index.pertemuan', $id);
    }
  }
}
