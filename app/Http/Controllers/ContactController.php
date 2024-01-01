<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    //
    public function send(){

        $data=request()->validate([
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
            'message'=>'required'


        ]);
        Contact::create($data);
        Mail::to('mohanadsoffo2002@gmail.com')->send(new ContactMail($data));
        return redirect()->back()->with('success','message sent successfully');
    }



    public function index(){

        $data=Contact::all();
        return view('admin.message.index',compact('data'));
    }




}
