<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Forum;
use App\ForumKuis;
use Auth;

class KuisPanelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $forum = Forum::where('id', $id)
                      ->first();
        $kuis = ForumKuis::where('forum_id', $id)
                      ->get();
        return view('webs.kuis.kuis_panel',[
            'forum' => $forum,
            'kuis'    => $kuis
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $forum = Forum::where('id', $id)
                      ->first();
        return view('webs.kuis.kuis_create',[
            'forum' => $forum
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
        $query = new ForumKuis();

        $query->forum_id  = $id;
        $query->user_id   = Auth::user()->id;
        $query->soal      = $request->soal;
        $query->pilihan_a  = $request->option_a;
        $query->pilihan_b  = $request->option_b;
        $query->pilihan_c  = $request->option_c;
        $query->pilihan_d  = $request->option_d;
        $query->pilihan_e  = $request->option_e;
        $query->jawaban   = $request->jawaban;

        if($query->save()) {
            return redirect()->route('index.kuispanel', $id);
        }
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
      $query = ForumKuis::findorFail($id);
      $forum_id = $query->forum_id;
      $query->delete();

      return redirect()->route('index.kuispanel', $forum_id)
                       ->with('success','Anda telah berhasil menghapus Data');
    }
}
