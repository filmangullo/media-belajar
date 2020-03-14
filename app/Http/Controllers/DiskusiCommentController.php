<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ForumDiskusi;
use App\DiskusiComment;
use Auth;

class DiskusiCommentController extends Controller
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
       return view('webs.pertemuan.comment',[
         'query'  => ForumDiskusi::findOrFail($id)
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
     $query = new DiskusiComment;

     $query->forum_id = ForumDiskusi::findOrFail($id)->forums['id'];
     $query->forum_diskusi_id = $id;
     $query->user_id = Auth::user()->id;
     $query->comment = $request->comment;

     if($query->save()) {
       return redirect()->route('index.pertemuan', ForumDiskusi::findOrFail($id)->forums['id']);
     }
   }
}
