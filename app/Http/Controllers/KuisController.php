<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Forum;
use App\ForumKuis;
use Auth;

class KuisController extends Controller
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

        $kuis = ForumKuis::where('forum_id', $id)
                      ->get();
        return view('webs.kuis.kuis', [
            'forum'   => $forum,
            'kuis'    => $kuis
        ]);
    }

    /**
     * Caculate hasil kuis
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function calculate(Request $request, $id)
    {
        $totalNilai = 0;
        $jumlahSoal = count($request->soal_ke_);

        for ($i = 0; $i < $jumlahSoal; $i++) {
          if($request->soal_ke_[$i] != null ) {
            $kuis = ForumKuis::where('id', $request->soal_ke_[$i])
                              ->first();
            if($kuis->jawaban == $request->jawaban_ke_[$i] && $request->jawaban_ke_[$i] != null ) {
              $totalNilai += 10;
            } else {
              $totalNilai += 0;
            }
          }

        }
        dd(  $totalNilai);
    }
}
