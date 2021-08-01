<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Mail;
use App\{User,Country,City,State,BuyerDetail,Category,Ad,AdImage,SellerDetail,AdRequest};
use DB;
use Auth;

class AdrequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['adrequest']=AdRequest::where('seller_id',Auth::user()->sellerDetail->id);
        if(!empty($request->ad)){
            $data['adrequest']=$data['adrequest']->where('ad_id',$request->ad);
            $ad=Ad::findorFail($request->ad);
            $data['adtitle']=$ad->title;
            $data['adid']=$ad->id;
        }
        $data['adrequest']=$data['adrequest']->orderBy('created_at','desc')->get();
        
        return view('user.seller.pages.adrequest',$data);
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
    public function requestaction(Request $request)
    {
        $ad=AdRequest::findOrFail($request->req_id);
        if($ad->status==0){
            if($request->status==1){
                AdRequest::where('ad_id',$request->ad_id)->where('id','!=',$request->req_id)->update([
                    'status'=>2,
                ]);
                $adof=Ad::findOrFail($request->ad_id);
                $adof->status=1;
                $adof->update();
                $msg="Ad Approve Successfully";
            }else if($request->status==2){
                $msg="Ad rejected Successfully";
            }    
            $ad->status=$request->status;
            $ad->update();
           
        
            $data=[
                'status'=>200,
                'msg'=>$msg,
            ];
        }else{
            $data=[
                'status'=>404,
                'msg'=>'Error You cant perform action on this',
            ];
        }
        return $data;

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
        $data['adrequest']=AdRequest::findorFail($id);
        
        return view('user.seller.pages.adrequestdetail',$data);
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
