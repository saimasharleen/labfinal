<?php

namespace App\Http\Controllers;
use DB; 
use App\Userinfo;
use App\login;
use App\preview;
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
    public function previewindex()
    {   if(session('email') == null){
           return redirect()->route('login');
        }
    else{
        $user = Userinfo::where('email',session('email'))->first();
        $userdata = Userinfo::where('usertype', 'customer')->get();
        return view('customer.pages.preview',compact(['user','userdata']));
        }
        
    }
    
     public function previewstore(Request $request)
    {
        $this->validate($request, [
            'name'=>'Required',
            'comment'=>'Required'
        ]);
        $user = new preview();
        $user -> name     = $request->name;
        $user -> comment     = $request->comment;
        $user ->save();


        return redirect()->route('preview')->with('message','Review added successfully');;
    }
}
