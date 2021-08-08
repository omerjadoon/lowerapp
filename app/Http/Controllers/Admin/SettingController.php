<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\{Country,City,State,Category};
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function contact_list(){
        $data['contact']=Contactus::orderBy('created_at','desc')->paginate(6);
         return view('admin.pages.contact-list',$data);
    }
    public function country(){
        $data['country']=Country::orderBy('created_at', 'desc')->get();
        $data['page']='index';
        return view('admin.pages.country',$data);
    }
    public function country_store(Request $request){
        $this->validate($request, [
                'country' => ['required', 'string'],
            ]);
        try{
            $data=new Country();
            $data->name=$request->country;
            $data->save();
            return redirect()->back()->with('success','Country Added SuccessFully');
        }
        catch(\Exception $ex){
            return redirect()->back()->with('error',$ex->getMessage());
        }
    }
    public function country_edit($value='')
    {
        $data['country']=Country::findOrFail($value);
        $data['page']='edit';
       return view('admin.pages.country',$data);
    }
    public function country_update($value,Request $request){
        try{
            $data=Country::findOrFail($value);
            $data->name=$request->country;
            $data->update();
            return redirect()->route('country_index')->with('success','Country Updated SuccessFully');
        }
        catch(\Exception $ex){
            return redirect()->back()->with('error',$ex->getMessage());
        }
    }
    public function country_del($value='')
    {
        try{
            $data=Country::findOrFail($value)->delete();   
            return redirect()->route('country_index')->with('success','Country Deleted Successfully');;
        }
        catch(\Exception $ex){
            return redirect()->back()->with('error',$ex->getMessage());
        }    
    }
    public function state(){
        $data['country']=Country::orderBy('created_at', 'desc')->get();
        $data['state']=State::orderBy('created_at', 'desc')->get();
        $data['page']='index';
        return view('admin.pages.state',$data);
    }
    public function state_store(Request $request)
    {
        $this->validate($request, [
                'country' => ['required'],
                 'state' => ['required', 'string'],
            ]);
        try{
            $data=new State();
            $data->name=$request->state;
            $data->country_id=$request->country;
            $data->save();
            return redirect()->back()->with('success','State Added SuccessFully');
        }
        catch(\Exception $ex){
            return redirect()->back()->with('error',$ex->getMessage());
        }
    }
    public function state_edit($value='')
    {
        $data['country']=Country::orderBy('created_at', 'desc')->get();
        $data['state']=State::findOrFail($value);
        $data['page']='edit';
       return view('admin.pages.state',$data);
    }
    public function state_update($value,Request $request){
        try{
            $data=State::findOrFail($value);
            $data->name=$request->state;
            $data->country_id=$request->country;
            $data->update();
            return redirect()->route('state_index')->with('success','State Updated SuccessFully');;
        }
        catch(\Exception $ex){
            return redirect()->back()->with('error',$ex->getMessage());
        }
    }
    public function state_del($value='')
    {
        try{
            $data=State::findOrFail($value)->delete();   
            return redirect()->route('state_index')->with('success','State Deleted SuccessFully');;
        }
        catch(\Exception $ex){
            return redirect()->back()->with('error',$ex->getMessage());
        }
    }
    public function city(){
        $data['state']=State::orderBy('created_at', 'desc')->get();
        $data['city']=City::orderBy('created_at', 'desc')->get();
        $data['page']='index';
        return view('admin.pages.city',$data);
    }
    public function city_store(Request $request)
    {

        $this->validate($request, [
                'state' => ['required'],
                 'city' => ['required', 'string'],
            ]);
        try{
            $data=new city();
            $data->name=$request->city;
            $data->state_id=$request->state;
            $data->save();
            return redirect()->back()->with('success','city Added SuccessFully');
        }
        catch(\Exception $ex){
            return redirect()->back()->with('error',$ex->getMessage());
        }
    }
    public function city_edit($value='')
    {
        $data['state']=State::orderBy('created_at', 'desc')->get();
        $data['city']=city::findOrFail($value);
        $data['page']='edit';
       return view('admin.pages.city',$data);
    }
    public function city_update($value,Request $request){
        try{

            $data=City::findOrFail($value);
            $data->name=$request->city;
            $data->state_id=$request->state;
            $data->update();
            return redirect()->route('city_index')->with('success','city Updated SuccessFully');
        }
        catch(\Exception $ex){
            return redirect()->back()->with('error',$ex->getMessage());
        }
    }
    public function city_del($value='')
    {
        try{
            $data=City::findOrFail($value)->delete();   
            return redirect()->route('city_index')->with('success','city Deleted SuccessFully');
        }
        catch(\Exception $ex){
            return redirect()->back()->with('error',$ex->getMessage());
        }
    }
    public function cat(){
      
        $data['cattype']=Category::orderBy('created_at', 'desc')->get();
         $data['page']='index';
        return view('admin.pages.cattype',$data);
    }
    public function cattype_store(Request $request)
    {
        $this->validate($request, [
                 'type' => ['required', 'string'],
                 'catfile'=>'required',
            ]);
        try{
            $data=new Category();
            $data->name=$request->type;
            $data->cat_slug=urlencode(strtolower($request->type));
            if($request->has('catfile')){
                $image=$request->file('catfile');
                $extension = $image->getClientOriginalExtension();
                $filename = 'cats-10101'.uniqid().'.'.$extension;
                $path = Storage::disk('s3')->put('caticon/'.$filename,file_get_contents($image), 'public');
                $filepath=Storage::disk('s3')->url('caticon/'.$filename);
                $data->file_name=$filename;
                $data->file_path=$filepath;
                $data->file_extension=$extension;
            }  
            $data->save();
            return redirect()->back()->with('success','cattype Added SuccessFully');
        }
        catch(\Exception $ex){
            return redirect()->back()->with('error',$ex->getMessage());
        }
    }
     public function cattype_edit($value='')
    {
        $data['cattype']=Category::findOrFail($value);
        $data['page']='edit';
       return view('admin.pages.cattype',$data);
    }
    public function cattype_update($value,Request $request){
        try{

            $data=Category::findOrFail($value);
            $data->name=$request->type;
            $data->cat_slug=urlencode(strtolower($request->type));
            if($request->has('catfile')){
                // Storage::disk('s3')->delete('caticon/'.$data->file_name);
                $image=$request->file('catfile');
                $extension = $image->getClientOriginalExtension();
                $filename = 'cats-10101'.uniqid().'.'.$extension;
                $path = Storage::disk('s3')->put('caticon/'.$filename,file_get_contents($image), 'public');
                $filepath=Storage::disk('s3')->url('caticon/'.$filename);
                $data->file_name=$filename;
                $data->file_path=$filepath;
                $data->file_extension=$extension;
            }  
            $data->update();
            return redirect()->route('cattype_index')->with('success','cattype Updated SuccessFully');
        }
        catch(\Exception $ex){
            return redirect()->back()->with('error',$ex->getMessage());
        }
    }
    public function cattype_del($value='')
    {
        try{
            $data=Category::findOrFail($value)->delete();   
            return redirect()->route('cattype_index')->with('success','cattype Deleted SuccessFully');
        }
        catch(\Exception $ex){
            return redirect()->back()->with('error',$ex->getMessage());
        }
    }
}