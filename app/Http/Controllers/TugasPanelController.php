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
        $query->open_tugas  = $request->open_tugas == "true" ? true : false;
        $query->deadline    = $request->deadline;
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
      $forum = Forum::where('id', $id)
                    ->first();
      return view('webs.tugas.create_tugas',[
          'forum' => $forum
      ]);
    }

    public function store_tugas (Request $request, $id)
    {
        $query = new ForumTugas;
        $query->forum_id    = $id;
        $query->user_id     = Auth::user()->id;
        $query->tugas       = $request->tugas;
        $query->nama        = null;
        $query->keterangan  = $request->keterangan;
        $query->tipe        = Controller::INPUT_TEXT ;

        if($query->save()) {
          return redirect()->route('index.tugaspanel', $id);
        }
    }

    public function edit_tugas ($id)
    {
        $tugas = ForumTugas::findOrFail($id);
        
        $forum = Forum::where('id', $tugas->forum_id)
                    ->first();
        return view('webs.tugas.edit_tugas',[
            'tugas' => $tugas,
            'forum' => $forum
        ]);
    }

    public function update_tugas (Request $request, $id)
    {
        $tugas = ForumTugas::findOrFail($id);

        $tugas->tugas = $request->tugas;
        $tugas->keterangan  = $request->keterangan;

        if($tugas->save()) {
            return redirect()->route('index.tugaspanel', $tugas->forum_id);
        }
    }

    public function destroy_tugas ($id) 
    {
        $query = ForumTugas::findorFail($id);
        $forum_id = $query->forum_id;
        $query->delete();

        return redirect()->route('index.tugaspanel', $forum_id)
                        ->with('success','Anda telah berhasil menghapus Data');
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

    public function download($id)
    {
        $query = ForumTugas::findOrFail($id);
        return response()->download(storage_path('app/' . $query->tugas));
    }

    public function change_file ($id)
    {
        $tugas = ForumTugas::findOrFail($id);
        $forum = Forum::where('id', $tugas->forum_id)
                    ->first();
        return view('webs.tugas.change_file',[
            'tugas' => $tugas,
            'forum' => $forum
        ]);
    }

    public function save_change_file (Request $request,$id)
    {

        $tugas = ForumTugas::findOrFail($id);

        $tugas->nama        = $request->name;
        $tugas->keterangan  = $request->keterangan;
        if ($request->file('file') != null ) {
            if(Storage::exists($tugas->tugas)){
                Storage::delete($tugas->tugas);
            }

            $path = Storage::putFile('public', $request->file('file'));
            $tugas->tugas       = $path;
        }
        if($tugas->save()) {
            return redirect()->route('index.tugaspanel', $tugas->forum_id);
        }
    }

    public function destroy_file ($id) 
    {
        
        $file = ForumTugas::findOrFail($id);
        $forum_id = $file->forum_id;

        if(Storage::exists($file->tugas)){
            Storage::delete($file->tugas);
        }

        if($file->delete()) {
            return redirect()->route('index.tugaspanel', $forum_id);
        }

        
    }
}
