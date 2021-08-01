<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use App\{User,Country,City,State,BuyerDetail,SellerDetail,Ad,AdRequest};
use DB;
use Auth;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function generatePin() {
        // Generate set of alpha characters
        $alpha = array();
        for ($u = 65; $u <= 90; $u++) {
            // Uppercase Char
            array_push($alpha, chr($u));
        }
        // Get random alpha character
        $rand_alpha = '';
        for ($i = 0; $i < 2; $i++) {
            $rand_alpha .= $alpha[rand(0, count($alpha) - 1)];
        }
        $pin=$rand_alpha.'-'.str_replace('0','',date('yhmids'));
        return $pin;
    }
    public function index(Request $request)
    {
        
        $data['addetail']=AdRequest::where('buyer_id',Auth::user()->buyerDetail->id);
        if($request->pending=='yes'){
            $data['link']='apply';
        $data['title']='Pending Approval';
        $data['icon']='Pending';
            $data['addetail']=$data['addetail']->where('status',0);
        }
        elseif($request->approve=='yes'){
            $data['link']='approve';
        $data['title']='Approved Ads';
        $data['icon']='Approved';
            $data['addetail']=$data['addetail']->where('status',1);
        }elseif($request->reject=='yes'){
            $data['link']='reject';
        $data['title']='Rejected Ads';
        $data['icon']='Rejected';
            $data['addetail']=$data['addetail']->where('status',2);
        }

        $data['addetail']=$data['addetail']->orderBy('created_at','desc')->get();
        return view('user.buyer.pages.adsinfo',$data);
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
    public function make_offer(Request $request){
        $ad=Ad::findorFail($request->ad);
        if($ad->status==0){
        $ofer=new AdRequest();
        $ofer->ad_u_id=$this->generatePin();
        $ofer->seller_id=$ad->seller_id;
        $ofer->ad_id=$ad->id;
        $ofer->buyer_id=Auth::user()->buyerDetail->id;
        $ofer->offer_price=$ad->price_range;
        $ofer->save();
        return back()->with('success','Your Offer Successfully Send');
        }else{
            return back()->with('error','This Ad is not available');
        }
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
        //
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
