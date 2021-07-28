<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Mail;
use App\{User,Country,City,State,BuyerDetail,Category,Ad,AdImage,SellerDetail};
use DB;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
        public function showLoginForm(){
            if(\Request::get('seller')){
                return view('user.seller.pages.login');
            }else if(\Request::get('buyer')){
                return view('user.buyer.pages.login');
            }else{
                return redirect()->back();
            }
        }
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function logout(Request $request){
        Auth::logout();
         return redirect('/');
     }
}
