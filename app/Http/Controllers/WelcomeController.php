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

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function search(Request $request)
  {
      // menangkap data pencarian
  		$cari = $request->search;

      		// mengambil data dari table pegawai sesuai pencarian data
  		$query = KelasMataPelajaran::where('nama','like',"%".$cari."%")
  		->paginate();
      // dd(!$query->count());
      $alert = "";
      if (!$query->count()) {
          $alert = '<div class="alert alert-warning mt-10" role="alert">
              Kelas tidak ditemukan !, Silahkan coba dengan kata lain..?
          </div>';
      }
      return view('webs.beranda.search', [
        'query' => $query,
        'alert' => $alert
      ]);
  }

}
