<?php

namespace App\Http\Controllers;
use DB; 
use App\Userinfo;
use App\login;
use App\pinfo;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function index(){
    if(session('email') == null){
           return redirect()->route('login');
        }
    else{
        $user = Userinfo::where('email',session('email'))->first();

         return view('admin.index',compact('user'));
        }
    }
    
    public function signup()
    {
        if(session('email') == null){
           return redirect()->route('login');
        }
    else{
        $user = Userinfo::where('email',session('email'))->first();
         return view('admin.pages.signup',compact('user'));
        }
         
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
            
        ]);
        $user = new userinfo();
        $user -> firstname     = $request->firstname;
        $user -> lastname      = $request->lastname;
        $user -> username      = $request->username;
        $user -> email         = $request->email;
        /*$user -> password      = $request->password;
        $user -> cpassword     = $request->cpassword;*/
        $user -> usertype      = $request->usertype;
        $user ->save();
        
        $userlogin = new login();
        $userlogin -> email         = $request->email;
        $userlogin -> password      = $request->password; 
        $userlogin -> usertype      = $request->usertype;         
        $userlogin ->save();

        return redirect()->route('signup')->with('message','registered successfully');;
    }
    public function pinfoindex()
    {   if(session('email') == null){
           return redirect()->route('login');
        }
    else{
        $user = Userinfo::where('email',session('email'))->first();
        $userdata = Userinfo::where('usertype', 'admin')->get();
        return view('admin.pages.pinfo',compact(['user','userdata']));
        }
        
    }
    
     public function pinfostore(Request $request)
    {
        $this->validate($request, [
            'name'=>'Required',
            'price'=>'Required',
            'review'=>'Required'
        ]);
        $user = new pinfo();
        $user -> name     = $request->name;
        $user -> price     = $request->price;
        $user -> review     = $request->review;
        $user ->save();


        return redirect()->route('pinfo')->with('message','New information added successfully');;
    }
    public function block($id){
        $userlogin = login::find($id);
        $userlogin->status = 1;
        $userlogin->save();
        return redirect()->route('userlist');
    }
    public function unblock($id){
        $userlogin = login::find($id);
        $userlogin->status = 0;
        $userlogin->save();
        return redirect()->route('userlist');
    }
     public function userlist()
    {  
        $userlogin = login::all();
        $user = Userinfo::where('email',session('email'))->first();
        //dd($user);
       return view('admin.pages.userlist',compact(['userlogin','user']));
    }
    public function profile()
    {   
         if(session('email') == null){
           return redirect()->route('login');
        }
    else{
        //dd(session('email')); 
        $user = Userinfo::where('email',session('email'))->first();
        $userlogin = login::where('email',session('email'))->first();
        //dd($user);
       return view('admin.pages.profile',compact(['user','userlogin']));
        }
    }
    public function updateProfile(Request $request)
    {
        /*$this->validate($request, [
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);*/

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $name);

        DB::table('user')
            ->where('email', session('email'))
            ->update(['img' => $name]);

        

    }
                //dd($request);
        $user = Userinfo::where('email',session('email'))->first();
        $user->firstname = $request->get('firstname');
        $user->lastname = $request->get('lastname');
        $user->username = $request->get('username');
        $user->update();
        return back();
    
    }
    public function uploadstore(Request $request)
    {
        $this->validate($request, [
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $name);
        //$this->save();

        $adv  = new userinfo([
            'image' => $name
        ]);
        $adv->save();

         return back();
        
    }
}
}
