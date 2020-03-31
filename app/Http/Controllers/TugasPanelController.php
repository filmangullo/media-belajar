<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Forum;
use App\ForumTugasPanel;
use Auth;

class TugasPanelController extends Controller
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

        $panel = ForumTugasPanel::where('forum_id', $forum->id)
                            ->first();

        return view('webs.tugas.tugas_panel',[
            'forum'     => $forum,
            'panel'     => $panel
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_panel(Request $request, $id)
    {
        $query = ForumTugasPanel::findorFail($id);
        $query->open_tugas = $request->open_tugas == "true" ? true : false;
        $query->save();

        return redirect()->route('index.tugaspanel', $query->forum_id)
                         ->with('success','Panel berhasil di Update');
    }
}
