<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class LoginController extends Controller
{
    public function UserLogin(){
        $id = Session::get('id');
        if($id){
            return Redirect::to('home');
        }else{
            return Redirect::to('')->send();
        }
    }
    public function index(){
   
    	return view('login_welcome');
    }
    public function show_dashboard(){
        $this->UserLogin();
    	return view('home.home');
    }
    public function dashboard(Request $request){
    	$email = $request->email;
    	$password = $request->password;
       
    	$result = DB::table('User')->where('email',$email)->where('password',$password)->where('stt','1')-> first();
    	if($result){
            Session::put('name',$result->name);
            Session::put('id',$result->id);
            Session::put('birth_day',$result->birth_day);
            Session::put('address',$result->address);
            Session::put('email',$result->email);
            Session::put('phone',$result->phone);
            Session::put('img',$result->img);
            return Redirect::to('/home');
        }else{
            Session::put('message','Password or account is wrong. Please re-enter');
            return Redirect::to('/');
        }

    }
    public function logout(){
        $this->UserLogin();
        Session::put('name',null);
        Session::put('id',null);
        return Redirect::to('/');
    }

    
}

