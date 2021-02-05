<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class ReceiverController extends Controller
{
    public function AuthLogin(){
        $id = Session::get('id');
        if($id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
      }
    
    
    
        public function addreceiver($id , Request $request){
          $this->AuthLogin();
          $all_user = DB::table('User')->where('admin_stt','user')->get();
          $all_receivers = DB::table('order')->where('order.id',$id)->get();
          $all_receiver = DB::table('Receiver')->where('receiver.ord_id',$id)->get();
            return view('admin.receiver.addreceiver')->with('all_user',$all_user)->with('all_receivers',$all_receivers)->with('all_receiver',$all_receiver);
        }
        public function save_receiver(Request $request){
            $this->AuthLogin();
              $data = array();
              $data['name'] = $request->name;
              $data['ord_id'] = $request->ord_id;
              $data['address'] = $request->address;  
              $data['phone'] = $request->phone;
              $data['email'] = $request->email;
            DB::table('Receiver')->insert($data);
             Session::put('message','Thêm người dùng thành công');
             return redirect()->back();
     
     }
 
    public function delete_receiver($id) {
       $this->AuthLogin();
        DB::table('Receiver')->where('id', $id)->delete();
        Session::put('message', 'Xóa sản phẩm thành công');
        return redirect()->back();
     
    } 
    
    
    
    
    }
