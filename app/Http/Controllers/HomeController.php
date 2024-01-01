<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Car;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        $data=Car::latest()->get();
        return view('home.index',[

            'data'=>$data


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
}
