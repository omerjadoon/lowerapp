<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Mail;
use App\{User,Country,City,State,BuyerDetail,SellerDetail};
use DB;
use Auth;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.seller.pages.dashboard');
    }
    public function account_setting(Request $request){
       
        $data['country']=Country::orderBy('created_at', 'desc')->get();
            return view('user.seller.pages.account',$data);
    }
    public function change_password(Request $request){
        return view('user.seller.pages.changepass');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            
        $this->validate($request,[
            'title'=>['required'],
            'f_name' => ['required', 'string', 'max:255'],
            'l_name' => ['required', 'string', 'max:255'],
            
            'address' => ['required', 'string', 'min:20','max:191'],
            'phone'=>['required', 'string','max:15'],
            'city'=>['required'],
            'zip_code'=>['required'],
        ]);

           try{
            $user=SellerDetail::findOrFail(Auth::user()->sellerDetail->id);
            $user->title=$request->title;
            $user->f_name = $request->f_name;
            $user->l_name = $request->l_name;
            $user->address = $request->address;
            $user->city_id=$request->city;
            $user->zip_code=$request->zip_code;
            $user->phone = $request->phone;
            if($request->has('profile')){
                    $image=$request->file('profile');
                    $extension = $image->getClientOriginalExtension();
                    $filename = 'user-'.Auth::user()->id.'00'.uniqid().'.'.$extension;
                    $path = Storage::disk('s3')->put('profileImages/'.$filename,file_get_contents($image), 'public');
                    $filepath=Storage::disk('s3')->url('profileImages/'.$filename);
                    $user->file_name=$filename;
                    $user->file_path=$filepath;
                   
                }    
            $user->update();
                return back()->with('success','Profile Updated Successfully');

        } catch (\Exception $ex) {
            dd($ex->getMessage());
            return back()->with('error',$ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
