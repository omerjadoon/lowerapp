<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Country,State,City,User,Contactus,Category,Ad,AdImage};
use Mail;
use DB;
use Auth;
class MainController extends Controller
{
    public function index(){
        $data['ad']=Ad::with('belongtocategory')->orderBy('created_at','desc')->get();
        $data['cat']=Category::take(8)->get();
        
        return view('welcome',$data);
    }
    public function allcate(Request $request){
        $data['cat']=Category::with('cathasmanyad')->get();
        return view('categories',$data);
    }

     public function allads(Request $request)
    {
        $data['ad']=Ad::with('belongtocategory')->orderBy('created_at','desc')->paginate(8);
        $data['cat']=Category::with('cathasmanyad')->get();
        return view('ads',$data);
    }
    public function adsdesc(Request $request,$slug){
       
        $data['ad']=Ad::with('belongtocategory','adhasmanyimage','belongtoseller')->where('ad_slug',$slug)->first();
        return view('addetail',$data);
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
