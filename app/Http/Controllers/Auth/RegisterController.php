<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\{User,Country,City,State,BuyerDetail,SellerDetail};
use Mail;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Notifications\Verifyuser;
use DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function showRegistrationForm() {

        $data['country']=Country::orderBy('created_at', 'desc')->get();
        // if(\Request::get('business')=='yes')
            return view ('auth.register',$data);
        // else if(\Request::get('media')=='yes')
        //     return view ('auth.mediaregister',$data);
            
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'title'=>['required'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'min:20','max:191'],
            'phone'=>['required', 'string','max:15'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'login.*' => ['required', 'string', 'min:8'],
            'agree'=>['required'],
            'role'=>['required'],
            'city'=>['required'],
            'zip_code'=>['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $collectionItems = $data['login'];
     $user=new User();
     $user->email = $data['email'];
     $user->password = Hash::make($collectionItems['password']);
     $user->role=$data['role'];
     $user->save();
        if($user->role=='buyer'){ 
            $tab=new BuyerDetail();
        }else if($user->role=='seller'){
            $tab=new SellerDetail();
        }
        $tab->user_id=$user->id;
        $tab->title=$data['title'];
        $tab->f_name = $data['first_name'];
        $tab->l_name = $data['last_name'];
        $tab->address = $data['address'];
        $tab->city_id=$data['city'];
        $tab->zip_code=$data['zip_code'];
        $tab->phone = $data['phone'];
        $tab->save();
        return $user;
      
    }
}
