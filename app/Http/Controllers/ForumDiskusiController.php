<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\ForumDiskusi;
use App\DiskusiComment;
use Auth;

class ForumDiskusiController extends Controller
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
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request, $id)
  {
    if ($request->file('file') == null) {
      $query = new ForumDiskusi;

      $query->forum_id        = $id;
      $query->user_id         = Auth::user()->id;
      $query->diskusi         = $request->diskusi;
    } else {

      $path = Storage::putFile('public', $request->file('file'));
      $query = new ForumDiskusi;

      $query->forum_id        = $id;
      $query->user_id         = Auth::user()->id;
      $query->diskusi         = $request->diskusi;
      $query->file            = substr($path,7);
      $query->extension_file  = $request->file('file')->getClientOriginalExtension();

    }


    if($query->save()) {
      return redirect()->route('index.pertemuan', $id);
    }
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $query = ForumDiskusi::findOrFail($id);

    return view('webs.pertemuan.diskusi_edit',[
      'query'  => $query
    ]);
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
      $query = ForumDiskusi::findOrFail($id);
      $query->diskusi = $request->diskusi;
      if($query->save()) {
        return redirect()->route('index.pertemuan', $query->forum_id);
      }
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function delete(Request $request, $id)
  {
    $query = ForumDiskusi::findOrFail($id);

    return view('webs.pertemuan.diskusi_destroy',[
      'query'  => $query
    ]);
  }

   /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $query = ForumDiskusi::findOrFail($id);
        $forum_id = $query->forum_id;

        foreach ($query->diskusiComments as $item) {
          $comment = DiskusiComment::findorFail($item->id);
          $comment->delete();
        }
        if(Storage::exists($query->file)){
            Storage::delete($query->file);
        }

        $query->delete();

        return redirect()->route('index.pertemuan', $forum_id);
    }
}
