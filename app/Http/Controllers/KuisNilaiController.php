<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Forum;

class KuisNilaiController extends Controller
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
        return view('webs.kuis.kuis_nilai',[
            'forum'   => $forum,

        ]);
    }
}
