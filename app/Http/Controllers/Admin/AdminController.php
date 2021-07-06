<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Hash;
use Session;
use Mail;
use App\{Admin};

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Session::has('admin_id'))
            return view('admin.login');
        else
            return redirect()->route('admin_home');
    }

    public function home(){

            return view('admin.pages.dashboard');

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
        if(!Session::has('admin_id')){
            $this->validate($request, [
                'user_name' => ['required', 'string'],
                'password' => ['required', 'string', 'min:8'],
            ]);

            extract($request->all());
                  
            try{
                $admin=Admin::where('user_name',$user_name)->first();
                if($admin && Hash::check($password, $admin->password)){
                    Session::put('admin_id',$admin->id);
                    Session::put('name',$admin->user_name);
                        return redirect()->route('admin_home');
                }else{
                     return redirect()->back()->with('cred_err', 'Invalid Credential.');
                }
            }catch(\Exception $ex){
                return redirect()->back()->with('error',$ex->getMessage());
            }
        }else{
            return redirect()->route('admin_home');
        }   
    }
    public function logout(){
        Session::forget('admin_id');
        Session::forget('name');
        return redirect()->route('admin-login.index');
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