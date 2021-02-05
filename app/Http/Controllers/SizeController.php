<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class SizeController extends Controller
{
  public function AuthLogin(){
    $id = Session::get('id');
    if($id){
        return Redirect::to('dashboard');
    }else{
        return Redirect::to('admin')->send();
    }
  }



    public function addsize($id , Request $request){
      $this->AuthLogin();
      $all_sizes = DB::table('Product')->where('Product.id',$id)->get();
      $all_size = DB::table('size_product')->where('size_product.id_pro',$id)->get();
        return view('admin.size.addsize')->with('all_sizes',$all_sizes)->with('all_size',$all_size);
    }
    public function save_size(Request $request){
        $this->AuthLogin();
          $data = array();
          $data['name'] = $request->name;
          $data['id_pro'] = $request->id_pro;
          $data['size_stt'] = 1; 
          $data['soluong'] = $request->soluong;  
    
        DB::table('size_product')->insert($data);
         Session::put('message','Thêm người dùng thành công');
         return redirect()->back();
 
 }


    

public function delete_size($id) {
   $this->AuthLogin();
    DB::table('size_product')->where('id', $id)->delete();
    Session::put('message', 'Xóa sản phẩm thành công');
    return redirect()->back();
 
} 


public function unactive_size($id){
  $this->AuthLogin();
  DB::table('size_product')->where('id',$id)->update(['size_stt'=>1]);
  Session::put('message','Size hữu dụng');
  return redirect()->back();
}
public function active_size($id){
  $this->AuthLogin();
  DB::table('size_product')->where('id',$id)->update(['size_stt'=>0]);
  Session::put('message','Size không hữu dụng');
  return redirect()->back();
}

}
