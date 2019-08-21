<?php

namespace App\Http\Controllers;
use App\Userinfo;
use Illuminate\Http\Request;
use App\productspost;

class uploadfileController extends Controller
{
    public function productspost()
    {   $user = Userinfo::where('email',session('email'))->first();
        return view('admin.pages.productspost',compact('user'));
    }
    public function store(Request $request)
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

        $adv  = new productspost([
            'image' => $name
        ]);
        $adv->save();

         return back();
        
    }

    }
}
