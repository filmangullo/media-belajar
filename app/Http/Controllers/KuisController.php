<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Forum;
use App\ForumKuis;
use App\ForumKuisPanel;
use App\ForumKuisNilai;
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

        $panel = ForumKuisPanel::where('forum_id', $forum->id)
                               ->first();

        $kuis = ForumKuis::where('forum_id', $id)
                      ->inRandomOrder()
                      ->take($panel->open_soal)
                      ->get();

        $nilai_kuis = null;
        $display_soal = true;
        $cek = ForumKuisNilai::where('user_id', Auth::user()->id)
                      ->where('forum_id', $id)
                      ->count();
        if (!$cek) {
          $nilai_kuis = "Anda Belum Melakukan kuis..?";
          $display_soal = true;
        } else {
          $queryNilai = ForumKuisNilai::where('user_id', Auth::user()->id)
                                      ->where('forum_id', $id)
                                      ->first();
          $nilai_kuis = $queryNilai->nilai;
          $display_soal = false;
        }
        
        

        return view('webs.kuis.kuis', [
            'forum'       => $forum,
            'kuis'        => $kuis,
            'nilai_kuis'  => $nilai_kuis,
            'display_soal'=> $display_soal
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
        $bobot_nilai = 100/$jumlahSoal;

        for ($i = 0; $i < $jumlahSoal; $i++) {
          if($request->soal_ke_[$i] != null ) {
            $kuis = ForumKuis::where('id', $request->soal_ke_[$i])
                              ->first();
            if($kuis->jawaban == $request->jawaban_ke_[$i] && $request->jawaban_ke_[$i] != null ) {
              $totalNilai += $bobot_nilai;
            } else {
              $totalNilai += 0;
            }
          }

        }


        $cek = ForumKuisNilai::where('user_id', Auth::user()->id)
                             ->where('forum_id', $id)
                             ->count();
        if (!$cek) {
          $query = new ForumKuisNilai;

          $query->forum_id    = $id;
          $query->user_id     = Auth::user()->id;
          $query->nilai       = $totalNilai;
          if($query->save()) {
            return redirect()->back()->withInput();
          }
          
        } else {
          return redirect()->back()->withInput()->with('info','Anda telah melakukan kuis, dan tidak boleh melakukan lg.');
        }
    }
}
