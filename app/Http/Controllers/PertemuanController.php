<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Participant;
use App\Forum;
use App\ForumDeskripsi;
use App\ForumFile;
use App\ForumDiskusi;
use App\DiskusiComment;
use App\ForumKuisPanel;
use App\ForumTugasPanel;


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

        $file = ForumFile::where('forum_id', $id)
                      ->get();

        $diskusi = ForumDiskusi::where('forum_id', $id)
                      ->orderBy('id')
                      ->get();

        $comments = DiskusiComment::where('forum_id', $id)
                      ->get();

        $panel = ForumKuisPanel::where('forum_id', $forum->id)
                      ->first();

        $panelTugas = ForumTugasPanel::where('forum_id', $forum->id)
                                ->first();

        return view('webs.pertemuan.pertemuan', [
            'participant' => $participant,
            'forum'       => $forum,
            'deskripsi'   => $deskripsi,
            'file'        => $file,
            'diskusi'     => $diskusi,
            'comments'    => $comments,
            'panel'       => $panel,
            'panelTugas'  => $panelTugas
        ]);
    }
}
