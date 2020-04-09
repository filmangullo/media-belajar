<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\Forum;
use App\ForumTugas;
use App\ForumTugasPanel;
use Auth;

class TugasPanelController extends Controller
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

        $panel = ForumTugasPanel::where('forum_id', $forum->id)
                                ->first();

        $tugas = ForumTugas::where('forum_id', $id)
                           ->get();

        return view('webs.tugas.tugas_panel',[
            'forum'     => $forum,
            'panel'     => $panel,
            'tugas'     => $tugas
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
        $query = ForumTugasPanel::findorFail($id);
        $query->open_tugas = $request->open_tugas == "true" ? true : false;
        $query->save();

        return redirect()->route('index.tugaspanel', $query->forum_id)
                         ->with('success','Panel berhasil di Update');
    }


    /**
     * Create the Tugas specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function create_tugas ($id)
    {

    }

    /**
     * Store the Tugas specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store_tugas (Request $request, $id)
    {

    }

    /**
     * Open the File Tugas specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function open_file ($id)
     {
        $forum = Forum::where('id', $id)
                      ->first();
        return view('webs.tugas.open_file',[
            'forum' => $forum
        ]);
     }

     /**
      * Open the File Tugas specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
      public function upload_file (Request $request, $id)
      {
          $path = Storage::putFile('public', $request->file('file'));
          $query = new ForumTugas;
          $query->forum_id    = $id;
          $query->user_id     = Auth::user()->id;
          $query->tugas       = $path;
          $query->nama        = $request->name;
          $query->keterangan  = $request->keterangan;
          $query->tipe        = Controller::INPUT_FILE;


          if($query->save()) {
            return redirect()->route('index.tugaspanel', $id);
          }
      }

      /**
       * Download the specified resource from storage.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function download($id)
      {
            $query = ForumTugas::findOrFail($id);
            return response()->download(storage_path('app/' . $query->tugas));
      }
}
