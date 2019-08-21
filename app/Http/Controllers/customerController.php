<?php

namespace App\Http\Controllers;
use DB; 
use App\Userinfo;
use App\login;

use Illuminate\Http\Request;

class customerController extends Controller
{
    public function index(){
    if(session('email') == null){
           return redirect()->route('login');
        }
    else{
        $user = Userinfo::where('email',session('email'))->first();

         return view('customer.index',compact('user'));
        }
    }
}
