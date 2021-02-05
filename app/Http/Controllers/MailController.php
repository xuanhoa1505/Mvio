<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Mail;
use DB;
use App\Mail\SendMail;
session_start();
class MailController extends Controller
{ 
    public function index()
    {
		$email  = DB::table('User')->where('admin_stt','user')->orderby('id','asc')->get(); 
        return view('emails.email')->with('email', $email);
    }

	
	public function sendemail(Request $get)
    {
        $this->validate($get,[
			"email"=>"required",
			"subject"=>"required",
			"message"=>"required",
		]);
		
		$email=$get->email;
		$subject=$get->subject;
		$message=$get->message;
		
		Mail::to($email)->send( new SendMail($subject,$message));
		Session::put('message','Gửi email thành công !!!');
        return redirect()->back();
    }	
	public function user($id , Request $request){
        
        $user = DB::table('User')
        ->where('User.id',$id)->get();
       
        return view('emails.emailuser')->with('user', $user);
      
      }

    public function sendemailuser(Request $get)
    {
        $this->validate($get,[
			"email"=>"required",
			"subject"=>"required",
			"message"=>"required",
		]);
		
		$email=$get->email;
		$subject=$get->subject;
		$message=$get->message;
		
		Mail::to($email)->send( new SendMail($subject,$message));
		Session::put('message','Gửi email thành công !!!');
        return redirect()->back();
    }
    
}