<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\Forum;
use App\ForumKuis;
use App\ForumKuisPanel;
use App\ForumKuisImg;
use Auth;

class KuisPanelController extends Controller
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
    public function index_panel($id)
    {
        $forum = Forum::where('id', $id)
                      ->first();
        $kuis = ForumKuis::where('forum_id', $id)
                      ->get();

        $panel = ForumKuisPanel::where('forum_id', $forum->id)
                      ->first();
        return view('webs.kuis.kuis_panel',[
            'forum'   => $forum,
            'kuis'    => $kuis,
            'panel'   => $panel
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
        $query = ForumKuisPanel::findorFail($id);
        $query->open_kuis = $request->open_kuis == "true" ? true : false;
        $query->open_soal = $request->open_soal;
        $query->save();

        return redirect()->route('index.kuispanel', $query->forum_id)
                         ->with('success','Panel berhasil di Update');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_soal($id)
    {
        $forum = Forum::where('id', $id)
                      ->first();
        return view('webs.kuis.kuis_create_soal',[
            'forum' => $forum
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_soal(Request $request, $id)
    {
        $query = new ForumKuis();

        $query->forum_id    = $id;
        $query->user_id     = Auth::user()->id;
        $query->soal        = $request->soal;
        $query->pilihan_a   = $request->option_a;
        $query->pilihan_b   = $request->option_b;
        $query->pilihan_c   = $request->option_c;
        $query->pilihan_d   = $request->option_d;
        $query->pilihan_e   = $request->option_e;
        $query->jawaban     = $request->jawaban;


        if($query->save()) {

            if ($request->file('img') == null) {

                return redirect()->route('index.kuispanel', $id);

            } else {

                $path   = Storage::putFile('public', $request->file('img'));
                $img    = new ForumKuisImg();

                $img->forum_kuis_id   = $query->id;
                $img->img             = substr($path,7);
                $img->extension_img  = $request->file('img')->getClientOriginalExtension();

                if($img->save()) {
                      return redirect()->route('index.kuispanel', $id);
                }
            }
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_soal($id)
    {
        $kuis = ForumKuis::findOrFail($id);
        return view('webs.kuis.kuis_edit_soal',[
            'kuis' => $kuis
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_soal(Request $request, $id)
    {
        $query = ForumKuis::findOrFail($id);

        $query->user_id   = Auth::user()->id;
        $query->soal      = $request->soal;
        $query->pilihan_a  = $request->option_a;
        $query->pilihan_b  = $request->option_b;
        $query->pilihan_c  = $request->option_c;
        $query->pilihan_d  = $request->option_d;
        $query->pilihan_e  = $request->option_e;
        $query->jawaban   = $request->jawaban;

        if($query->save()) {
            return redirect()->route('index.kuispanel', $query->forum_id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_soal($id)
    {
      $query = ForumKuis::findorFail($id);
      $forum_id = $query->forum_id;
      $query->delete();

      return redirect()->route('index.kuispanel', $forum_id)
                       ->with('success','Anda telah berhasil menghapus Data');
    }
}
