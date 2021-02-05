<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\imgs;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class ImagesController extends Controller
{
  public function AuthLogin(){
    $id = Session::get('id');
    if($id){
        return Redirect::to('dashboard');
    }else{
        return Redirect::to('admin')->send();
    }
  }



    public function addimgs($id , Request $request){
      $this->AuthLogin();
      $all_imgs = DB::table('Product')->where('Product.id',$id)->get();
      $all_img = DB::table('Imgs')->where('Imgs.id_pro',$id)->get();
        return view('admin.imgs.addimgs')->with('all_imgs',$all_imgs)->with('all_img',$all_img);
    }
    public function save_imgs(Request $request){
        $this->AuthLogin();
          $data = array();
          $data['id_pro'] = $request->id_pro;
          $data['stt'] = 1; 
          $data['img'] = $request->img;  
          $get_image = $request->file('img');
     if($get_image){
             $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
             $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
             $get_image->move('public/Img/imgs',$new_image);
           $data['img'] = $new_image;
             DB::table('Imgs')->insert($data);
             Session::put('message','Thêm ảnh thành công');
             return redirect()->back();
        }
         $data['img'] = '';
        DB::table('Imgs')->insert($data);
         Session::put('message','Thêm người dùng thành công');
         return redirect()->back();
 
 }


    

public function delete_imgs($id) {
   $this->AuthLogin();
    DB::table('Imgs')->where('id', $id)->delete();
    Session::put('message', 'Xóa sản phẩm thành công');
    return redirect()->back();
 
} 


public function unactive_imgs($id){
  $this->AuthLogin();
  DB::table('Imgs')->where('id',$id)->update(['stt'=>1]);
  Session::put('message','Cho phép hình ảnh hiển thi trang chủ');
  return redirect()->back();
}
public function active_imgs($id){
  $this->AuthLogin();
  DB::table('Imgs')->where('id',$id)->update(['stt'=>0]);
  Session::put('message','Không phép hình ảnh hiển thi trang chủ');
  return redirect()->back();
}

}
