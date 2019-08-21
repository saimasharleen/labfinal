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
        }
    else{
           return redirect()->route('login');
        $user = Userinfo::where('email',session('email'))->first();
         return view('admin.pages.signup',compact('user'));
        }*/
         /*$user = Userinfo::where('email',session('email'))->first();
         return view('admin.pages.signup',compact('user'));*/
         return view('admin.pages.signup');
    }
     public function store(Request $request)
    {
        $this->validate($request, [
            'firstname'=>'Required',
            'lastname'=>'Required',
            'username'=>'Required',
            /*'email'=>'Required',*/
            'password'=>'Required',
            'cpassword'=>'Required',
            'usertype'=>'Required',
            'cname'=>'Required',
            'licenseno'=>'Required',
            'contactno'=>'Required',
            'city'=>'Required',
            'address'=>'Required',
            'postalcode'=>'Required'
        ]);
        $user = new userinfo();
        $user -> firstname     = $request->firstname;
        $user -> lastname      = $request->lastname;
        $user -> username      = $request->username;
        $user -> email         = $request->email;
        $user -> usertype      = $request->usertype;
        $user ->save();
        
        $userlogin = new login();
        $userlogin -> email         = $request->email;
        $userlogin -> password      = $request->password; 
        $userlogin -> usertype      = $request->usertype;         
        $userlogin ->save();

        return redirect()->route('signup')->with('message','registered successfully');;
    }
    

}
