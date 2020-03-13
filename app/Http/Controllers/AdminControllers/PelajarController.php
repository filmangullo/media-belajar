<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class PelajarController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelajar = User::where('role', User::ROLE_PELAJAR)
                    ->get();
        return view('admins.pelajar', [
            'pelajar' => $pelajar
        ]);
    }
}
