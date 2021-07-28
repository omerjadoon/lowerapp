<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Country,State,City,User,Contactus};
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
    public function savecontact(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'phone_number' => 'required',
            'message' => 'required'
        ]);
       $data=[
        
                 'name' => $request->name,
                 'email' => $request->email,
                 'subject' => $request->subject,
                 'phone_number' => $request->phone_number,
                 'message' => $request->message,
             
       ];
        try{
            Mail::send('emails.contact-us',['data' => $data], function($message) use ($data)
               {
                $message->from($data['email'], $data['name']);
                $message->to('bigprofitads@gmail.com')->subject('Contact Us');
               });
            $contact = new Contactus();
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->subject = $request->subject;
            $contact->phone_number = $request->phone_number;
            $contact->message = $request->message;
            $contact->save();
               return redirect()->back()->with("success","Thank you for your message, you'll hear back from us shortly!");
          
        }
        catch(\Exception $ex){
            return redirect()->back()->with('error',$ex->getMessage());
          
        }
        
    }
}
