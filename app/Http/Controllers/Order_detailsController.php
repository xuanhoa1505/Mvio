<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class Order_detailsController extends Controller
{
    public function AuthLogin(){
        $id = Session::get('id');
        if($id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
      }

    
    
        public function addode_d($id , Request $request){
          $this->AuthLogin();
          //$all_user = DB::table('User')->where('admin_stt','user')->get();->with('all_user',$all_user)
          $all_ode_d = DB::table('order')->where('order.id',$id)->get();
          $all_order_details= DB::table('order_details')->where('order_details.ord_id',$id)->get();
            return view('admin.ode_d.addode_d')->with('all_order_details',$all_order_details)->with('all_ode_d',$all_ode_d);
        }
        public function save_ode_d(Request $request){
            $this->AuthLogin();
              $data = array();
              $data['ord_id'] = $request->ord_id;
              $data['id_pro'] = 20;  
              $data['pro_name'] = $request->pro_name;
              $data['pro_price'] = $request->pro_price;
              $data['pro_quantity'] = $request->pro_quantity;
            
            DB::table('order_details')->insert($data);
             Session::put('message','Thêm người dùng thành công');
             return redirect()->back();
     
     }
 
    public function delete_ode_d($id) {
       $this->AuthLogin();
        DB::table('order_details')->where('id', $id)->delete();
        Session::put('message', 'Xóa sản phẩm thành công');
        return redirect()->back();
     
    } 
    
    public function edit_ord_d($id) {
      $this->AuthLogin();
       
    
        $edit_Ord_d = DB::table('order_details')->where('id', $id)->get();
      
        $manager_Ord_d = view('admin.ode_d.editorde_d')->with('edit_Ord_d', $edit_Ord_d);
       
        return view('admin')->with('admin.ode_d.editorde_d', $manager_Ord_d);
    }
    public function update_ord_d (Request $request, $id) {
     $this->AuthLogin();
        $data = array();
        $data['ord_id'] = $request->ord_id;
        $data['id_pro'] = 20;  
        $data['pro_name'] = $request->pro_name;
        $data['pro_price'] = $request->pro_price;
        $data['pro_quantity'] = $request->pro_quantity;
    
        DB::table('order_details')->where('id', $id)->update($data);
        Session::put('message', 'Cập nhật sản phẩm thành công');
        return redirect()->back();
    }
    
    
    }
