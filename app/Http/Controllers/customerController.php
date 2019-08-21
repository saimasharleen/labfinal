<?php

namespace App\Http\Controllers;
use DB; 
use App\Userinfo;
use App\login;
use App\preview;
use App\pinfo;
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
    public function search(Request $request)
    {
        if($request->ajax())
        {
            $output="";
            $users=DB::table('pinfo')->where('name','like','%'. $request->search.'%')
                    ->get();
            if($users)
            {
                foreach ($users as $key => $user) {
                $output.='<tr>'.
            
                '<td>'.$user->name.'</td>'.
                '<td>'.$user->review.'</td>'.
                '<td>'.$user->price.'</td>'.
                
                '</tr>';
                }
            return Response($output);
            }
        }
    }
    public function productlist()
    {  
         if(session('email') == null){
           return redirect()->route('login');
        }
    else{
        $user = Userinfo::where('email',session('email'))->first();
        $userdata = pinfo::all();
        //dd($user);
       return view('customer.pages.productlist',compact(['user','userdata']));
        }
    }
}
