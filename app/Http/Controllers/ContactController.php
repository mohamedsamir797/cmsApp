<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        return view('contact.index');
    }

    public function all(){
        $contacts = Contact::all();
        return view('contact.all',['contacts'=>$contacts]);
    }

    public function store(Request $request){
        request()->validate([
            'name'=> 'required',
            'email'=> 'required',
            'subject'=> 'required',
            'message'=> 'required',

        ]);
        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();

        session()->flash('success','your message sent successfully');
        return back();
    }
}
