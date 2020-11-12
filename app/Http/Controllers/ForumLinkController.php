<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ForumVideo;

class ForumLinkController extends Controller
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
        return view('webs.pertemuan.link',[
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
        $query = new ForumVideo;
        $query->forum_id    = $id;
        $query->title       = $request->title;
        $query->video       = $request->link;
        $query->type        = 'link';

        if($query->save()) {
          return redirect()->route('index.pertemuan', $id);
        }
    }
}
