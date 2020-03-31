<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\KelasMataPelajaran;
use App\Participant;

class MyCoursesController extends Controller
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
    public function index()
    {
        $query = Participant::where('user_id', Auth::user()->id)
                            ->get();
        return view ('webs.courses_my.courses', [
            'kelas' => $query
        ]);
    }
}
