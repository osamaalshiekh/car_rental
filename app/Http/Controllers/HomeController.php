<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Car;
use App\Models\Comment;
use App\Models\FAQ;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){

        $data = Car::where('availability', true)->get();
        return view('home.index',[

            'data'=>$data,


        ]);
    }

    public function detail($pid)
    {
        $user=Auth::user();
        $data = Car::findOrFail($pid);
        $activeReservationExists = $user ? $user->reservations()->where('status', 'active')->exists() : false;

        $comments = $data->comments()->latest()->get();

        return view('home.detail', [
            'data' => $data,
            'comments' => $comments,
            'activeReservationExists'=>$activeReservationExists

        ]);
    }

    public function blog(){
        $data=Blog::all();

        return view('home.blog',[

           'data'=>$data
        ]);

    } public function faq(){
        $data=FAQ::all();

        return view('home.faq',[

           'data'=>$data
        ]);

    }
    public function blogdetail($id){

        $data=Blog::find($id);
        return view('home.blogdetail',[

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

    public function make_reply(Request $request){

        $request->validate([
            'reply' => 'required|string',
            'comment_id' => 'required|exists:comments,id',
            'car_id' => 'required|exists:cars,id'
        ]);

        $comment = new Comment();
        $comment->subject = $request->reply;
        $comment->type = 'REPLY';
        $comment->user_id = auth()->id();
        $comment->comment_id = $request->comment_id;
        $comment->car_id = $request->car_id;
        $comment->save();
        return redirect()->back()->with("success","Commented gracefully!");
    }

    public function about(){

        return view('home.about');
    }

}
