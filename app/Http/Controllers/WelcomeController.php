<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KelasMataPelajaran;

class WelcomeController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $query = KelasMataPelajaran::limit(8)->get();
      $newquery = KelasMataPelajaran::orderBy('id', 'desc')->limit(8)->get();
      return view('webs.welcome', [
        'kelas' => $query,
        'newKelas'  => $newquery
      ]);
  }

}
