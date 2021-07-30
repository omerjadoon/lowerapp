<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->role=='seller')
        return redirect()->route('dashboard.index');
        else
        return redirect()->route('main');
    }
   
     public function change_passwordstore(Request $request){

           $this->validate($request,[
            'oldpassword' => 'required|string',
            'password' => 'required|min:8|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'required|string|min:8',
            ]);
         try{  
            if(Hash::check($request->oldpassword,Auth::user()->password)){
                    $user = Auth::user();
                    $user->password =Hash::make($request->password);
                    $user->update(); 
                return back()->with('success','Password Updated Successfully');
            }else{
                return back()->with('error',"old Password doesn't match");
            }
        }   
         catch(\Exception $ex){
            return back()->with('error',$ex->getMessage());
        }

    }
}
