<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\ForumVideo;

class ForumVideoController extends Controller
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
        return view('webs.pertemuan.video',[
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
        $path = Storage::putFile('public', $request->file('video'));
        $query = new ForumVideo;
        $query->forum_id    = $id;
        $query->title       = $request->title;
        $query->video       = substr($path,7);
        $query->type        = 'video';

        if($query->save()) {
          return redirect()->route('index.pertemuan', $id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = ForumVideo::findOrFail($id);
        $forum_id = $video ->forum_id;

        if(Storage::exists($video->video)){
            Storage::delete($video->video);
        }

        $video->delete();

        return redirect()->route('index.pertemuan', $forum_id);
    }
}
