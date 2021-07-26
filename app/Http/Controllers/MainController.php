<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Country,State,City,User};
use Mail;
use DB;
use Auth;
class MainController extends Controller
{
    public function index(){
        return view('welcome');
    }
    protected  function getstatebycountryid(Request $request){
        extract($request->all());
        $state=State::where('country_id',$country_id)->get();
        return $state;
    }
    protected  function getcitybystateid(Request $request){
        extract($request->all());
        $city=City::where('state_id',$state_id)->get();
        return $city;
    }
}
