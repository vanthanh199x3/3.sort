<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class AdminController extends Controller
{

public function index(){
 return view('admin_login');
}


public function show_dashboard(Request $request){
    $test = 'abc';  

    return view('admin.dashboard')->with('test',$test);
}
 public function admin_login(Request $request){
       
      $admin_email=$request->admin_email;
      $admin_password=md5($request->admin_password);

      $result=DB::table('tbl_admin')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
      if($result)
      {
        Session::put('admin_name',$result->admin_name);
        Session::put('admin_id',$result->admin_id);
        return Redirect::to('/dashboard');
      }
      else
      { 
        return Redirect::to('/admin');

      }

    }
public function logout(){
    Session::put('admin_name',null);
    Session::put('admin_id',null);
    return Redirect::to('/admin');
}
}
