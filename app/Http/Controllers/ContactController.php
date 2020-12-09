<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('webs.contact.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contact = new Contact;

        $contact->name      = $request->name;
        $contact->email     = $request->email;
        $contact->subject   = $request->subject;
        $contact->message   = $request->message;

        if ($contact->save()) {
            return redirect()->back()->with('success','Terimaksih, pesan anda akan kami proses, dan akan kami balas melalui email yang tertaut.');
        }
    }
}
