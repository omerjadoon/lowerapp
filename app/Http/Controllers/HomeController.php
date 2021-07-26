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
    }
    public function change_password(Request $request){
        return view('auth.passwords.changepass');
    }
     public function change_passwordstore(Request $request){

           $this->validate($request,[
               'password'=>['required','string'],
               'password'=>['required','string'],
               'password_confirmation' =>['required','string'],
            
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
