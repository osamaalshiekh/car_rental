<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Car;
use App\Models\Comment;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        $data=Car::latest()->get();
        return view('home.index',[

            'data'=>$data,


        ]);
    }

    public function detail($pid)
    {

        $data = Car::find($pid);
        $comments = $data->comments()->latest()->get();

        return view('home.detail', [
            'data' => $data,
            'comments' => $comments

        ]);
    }

    public function blog(){
        $data=Blog::all();

        return view('home.blog',[

           'data'=>$data
        ]);

    }

    public function mail(){

        return view('home.mail');
    }

    public function search(Request $request){
        $searchTerm = $request->input('search');
        $data = Car::where('model', 'like', '%' . $searchTerm . '%')->get();
        return view('home.search', compact('data'));
    }

    public function make_comment(Request $req){

        $req->validate([
            'rate' => 'required',
            'subject' => 'required'
        ]);
        $newComment = new Comment();
        $newComment->user_id = auth()->user()->id;
        $newComment->car_id = $req->car_id;
        $newComment->rate = $req->rate;
        $newComment->type = "COMMENT";
        $newComment->subject = $req->subject;
        $newComment->save();

        return redirect()->back()->with("success","Commented gracefully!");
    }

    public function make_reply(Request $req){

        $req->validate([
            'rate' => 'required',
            'subject' => 'required'
        ]);

        $newComment = new Comment();
        $newComment->user_id = auth()->user()->id;
        $newComment->car_id = $req->car_id;
        $newComment->rate = -1;
        $newComment->type = "REPLY";
        $newComment->comment_id = $req->comment_id;
        $newComment->subject = $req->reply;
        $newComment->save();
        return redirect()->back()->with("success","Commented gracefully!");
    }


}
