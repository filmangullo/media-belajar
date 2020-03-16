<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Participant;
use App\Forum;
use App\ForumDeskripsi;
use App\ForumDiskusi;
use App\DiskusiComment;


class PertemuanController extends Controller
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

        $participant = Participant::where('kelas_mata_pelajarans_id', $forum->kelasmatapelajarans['id'])
                                  ->get();

        $deskripsi = ForumDeskripsi::where('forum_id', $id)
                      ->get();

        $diskusi = ForumDiskusi::where('forum_id', $id)
                      ->orderBy('id')
                      ->get();

        $comments = DiskusiComment::where('forum_id', $id)
                      ->get();
        return view('webs.pertemuan.pertemuan', [
            'participant' => $participant,
            'forum'       => $forum,
            'deskripsi'   => $deskripsi,
            'diskusi'     => $diskusi,
            'comments'    => $comments
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }
}
