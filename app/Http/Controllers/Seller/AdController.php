<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        $data['ads']=new Ad();
        if(!empty($request->title)){
            $data['ads']=$data['ads']->where('title','like', '%' . $request->title.'%');
        }
        if(!empty($request->category)){
            $data['ads']=$data['ads']->where('cat_id',$request->category);
        }
        if(!empty($request->p_range_from) || !empty($request->p_range_to)){
            $data['ads']=$data['ads']->whereBetween('price_range',[$request->p_range_from,$request->p_range_to]);
        }
        if(!empty($request->p_l_range_from) || !empty($request->p_l_range_to)){
            $data['ads']=$data['ads']->whereBetween('lower_selling_price',[$request->p_l_range_from,$request->p_l_range_to]);
        }
        $data['ads']=$data['ads']->where('seller_id',Auth::user()->sellerDetail->id)->orderBy('created_at','desc')->paginate(12);

        $data['category']=Category::all();
       
        return view('user.seller.pages.adindex',$data);
    }
    public function uploadadindex(){
        $data['category']=Category::all();
        return view('user.seller.pages.uploadad',$data);
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
    public function validation(Request $request){
     
        if($request->checkaddr=='step1'){
            $this->validate($request,[
                'coverfile'=>['required'],
                'category'=>['required'],
                'title' => ['required', 'string', 'max:255'],
                'desc' => ['required', 'string','min:100', 'max:500'],
            ]);
        }else if($request->checkaddr=='step2'){
            $this->validate($request,[
                'price_range'=>['required'],
                'no_of_days'=>['required'],
                'discounttype' => ['required'],
                'lower_selling_price' => ['required'],
            ]);
            if($request->discounttype=='amt_wise'){
                $this->validate($request,[
                    'dis_amount'=>['required'],
                ]);
            }else{
                $this->validate($request,[
                    'dis_percent'=>['required'],
                ]);
            }
        }
        else if($request->checkaddr=='step3'){
            
            $this->validate($request,[
                'adsfile'=>['required','array','min:6'],
            ]);
            // dd($request->adsfile);
            
        }
        dd($request->all());
        
    }
    public function store(Request $request)
    {
           
        // $this->validate($request,[
        //     'coverfile'=>['required'],
        //     'adsfile'=>['required','array','min:6'],
        //     'category'=>['required'],
        //     'title' => ['required', 'string', 'max:255'],
        //     'desc' => ['required', 'string','min:100', 'max:500'],
        //     'price_range' => ['required','integer'],
        //     'lower_selling_price'=>['required', 'integer'],
        // ]);
        DB::beginTransaction();
        $slug=urlencode(strtolower($request->title));
        $adslug=Ad::where('ad_slug',$slug)->count();
        if($adslug>0){
            $slug=urlencode(strtolower($request->title)).'-'.$adslug;
        }
        try{
            $ads=new Ad();
            $ads->title=$request->title;
            $ads->ad_slug=$slug;
            $ads->cat_id=$request->category;
            $ads->desc=$request->desc;
            $ads->price_range=$request->price_range;
            $ads->actual_price=$request->price_range;
            $ads->lower_selling_price=$request->lower_selling_price;
            $ads->seller_id=Auth::user()->sellerDetail->id;
            $ads->no_of_days=$request->no_of_days;
            $ads->discounttype=$request->discounttype;
            if($request->discounttype=='amt_wise'){
                $ads->perdaydiscount=$request->dis_amount;
            }
            else{
                $ads->perdaydiscount=$request->dis_percent;
            }
            if($request->has('coverfile')){
                $image=$request->file('coverfile');
                $extension = $image->getClientOriginalExtension();
                $filename = 'AdsCOVER-'.Auth::user()->id.'9090'.uniqid().'.'.$extension;
                $path = Storage::disk('s3')->put('AdsFile/'.$filename,file_get_contents($image), 'public');
                $filepath=Storage::disk('s3')->url('AdsFile/'.$filename);
                $ads->cover_file_name=$filename;
                $ads->cover_file_path=$filepath;
                $ads->cover_file_extension=$extension;
            }  
            $ads->save();
            for($i=0;$i<count($request->adsfile);$i++){
                $adimage=new AdImage();
                $adimage->ad_id=$ads->id;
                $image=$request->file('adsfile')[$i];
                $extension = $image->getClientOriginalExtension();
                $filename = 'Ads-'.Auth::user()->id.'9090'.uniqid().'.'.$extension;
                $path = Storage::disk('s3')->put('AdsFile/'.$filename,file_get_contents($image), 'public');
                $filepath=Storage::disk('s3')->url('AdsFile/'.$filename);
                $adimage->file_name=$filename;
                $adimage->file_path=$filepath;
                $adimage->file_extension=$extension;
                $adimage->save();
            }

        DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            dd($e->getMessage());
            return redirect()->back()->with('error',$e->getMessage());
        }
        return redirect()->back()->with('success','Ad created Successfully');
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['category']=Category::all();
        $data['ad']=Ad::findOrFail($id);
        return view('user.seller.pages.addetail',$data);   
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
