<?php

namespace App\Http\Controllers;
use DB; 
use App\Userinfo;
use App\login;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function index(){
    /*if(session('email') == null){
           return redirect()->route('login');
        }
    else{
        $user = Userinfo::where('email',session('email'))->first();

         return view('admin.index',compact('user'));
        }*/
/*        $user = Userinfo::where('email',session('email'))->first();

         return view('admin.index',compact('user'));*/
         return view('admin.index');
    }
    public function signup()
    {
       /* if(session('email') == null){
           return redirect()->route('login');
        }
    else{
        $user = Userinfo::where('email',session('email'))->first();
         return view('admin.pages.signup',compact('user'));
        }*/
         /*$user = Userinfo::where('email',session('email'))->first();
         return view('admin.pages.signup',compact('user'));*/
         return view('admin.pages.signup');
    }

}
