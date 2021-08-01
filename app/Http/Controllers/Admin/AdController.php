<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use App\{User,Country,City,State,BuyerDetail,Category,Ad,AdImage,SellerDetail,AdRequest};
use DB;
use Auth;
class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 
        $data['category']=Category::all();
            $data['adsection']=new Ad();
            if(!empty($request->title)){
                $data['adsection']=$data['adsection']->where('title','like', '%' . $request->title.'%');
            }
            if(!empty($request->category)){
                $data['adsection']=$data['adsection']->where('cat_id',$request->category);
            }
            if(!empty($request->p_range_from) || !empty($request->p_range_to)){
                $data['adsection']=$data['adsection']->whereBetween('price_range',[$request->p_range_from,$request->p_range_to]);
            }
            if(!empty($request->seller_id)){
                $seller=SellerDetail::findorFail($request->seller_id);
                $data['seller_name']=$seller->title.' '.$seller->f_name.' '.$seller->l_name;
                $data['adsection']=$data['adsection']->where('seller_id',$request->seller_id);
            }
            $data['adsection']=$data['adsection']->orderBy('created_at','desc')->paginate(12);
        return view('admin.pages.adindex',$data);
    }
    public function adofer(Request $request){
        $data['offer']=new AdRequest;
        if($request->ad_id){
            $data['offer']= $data['offer']->where('ad_id',$request->ad_id);
            $ad=Ad::findorFail($request->ad_id);
            $data['ad_title']=$ad->title;
            $data['adid']=$ad->id;
        }
        $data['offer']= $data['offer']->orderBy('created_at','desc')->get();
        return view('admin.pages.adoffer',$data);
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
        $data['adsection']=Ad::with('adhasmanyimage')->where('id',$id)->first();
        // dd($data);
        return view('admin.pages.addetail',$data);
    }
    public function offershow($id)
    {
        $data['adsection']=AdRequest::findorFail($id);
        // dd($data);
        return view('admin.pages.adofferdetail',$data);
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
