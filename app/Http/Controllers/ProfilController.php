<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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
        return view('webs.profil.edit', [
            'user' => User::findOrFail($id)
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
        $user = User::findOrFail($id);

        $user->email    = $request->email;
        $user->nip      = $request->nip;
        $user->phone    = $request->phone;
        $user->Jurusan  = $request->Jurusan;
        $user->save();

        return redirect()->back();
    }
}
