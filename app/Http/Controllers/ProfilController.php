<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\User;
use Auth;

class ProfilController extends Controller
{
    public function index(Request $request) {

        $user = User::findOrFail($request->user_id);
        return view('webs.profil.index', [
            'user'  => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      if (Auth::user()->id == $id ) {
          return view('webs.profil.edit', [
              'user' => User::findOrFail($id)
          ]);
      }

      abort(404);
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

        if (Auth::user()->id == $id ) {
            $user = User::findOrFail($id);

            $user->name    = $request->name;
            $user->email    = $request->email;
            $user->nip      = $request->nip;
            $user->phone    = $request->phone;
            $user->Jurusan  = $request->Jurusan;

            if ($request->file('avatar') != null ) {
                if ( $user->avatar == null ) {
                  $path           = Storage::putFile('public', $request->file('avatar'));
                  $user->avatar   = substr($path,7);
                } else {
                  if(Storage::exists('public/'.$user->avatar)){
                       Storage::delete('public/'.$user->avatar);
                  }
                  $path           = Storage::putFile('public', $request->file('avatar'));
                  $user->avatar   = substr($path,7);
                }
            }
            $user->save();

            return redirect()->back();
        }

        abort(404);
    }
}
