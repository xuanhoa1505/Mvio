<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class LogoController extends Controller
{
    public function AuthLogin(){
      $id = Session::get('id');
      if($id){
          return Redirect::to('dashboard');
      }else{
          return Redirect::to('admin')->send();
      }
    }
  
    public function all_logo(){
      $this->AuthLogin();
      $all_logo = DB::table('Logo')->get();
    $manager_logo  = view('admin.logo.listlogo')->with('all_logo',$all_logo);
    return view('admin')->with('admin.logo.listlogo', $manager_logo );
  
  }
  
      public function addlogo(){
        $this->AuthLogin();
          return view('admin.logo.addlogo');
      }
      public function save_logo(Request $request){
          $this->AuthLogin();
            $data = array();
            $data['name'] = $request->name;
            $data['stt'] = $request->stt; 
            $data['img'] = $request->img;  
            $get_image = $request->file('img');
       if($get_image){
               $get_name_image = $get_image->getClientOriginalName();
              $name_image = current(explode('.',$get_name_image));
               $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
               $get_image->move('public/Img/logo',$new_image);
             $data['img'] = $new_image;
               DB::table('Logo')->insert($data);
               Session::put('message','Thêm ảnh thành công');
              return Redirect::to('all-logo');
          }
           $data['img'] = '';
          DB::table('Logo')->insert($data);
          notify()->success('thêm danh mục thành công!');
          // Session::put('message','Thêm người dùng thành công');
          return Redirect::to('all-logo');
   
   }
  
   public function unactive_logo($id){
    $this->AuthLogin();
    DB::table('Logo')->where('id',$id)->update(['stt'=>1]);
    Session::put('message','Không kích hoạt loại đề tài thành công');
    return Redirect::to('all-logo');
  
  }
  public function active_logo($id){
    $this->AuthLogin();
   DB::table('Logo')->where('id',$id)->update(['stt'=>0]);
   Session::put('message','Kích hoạt loại đề tài thành công');
   return Redirect::to('all-logo');
  }
      
  public function edit_logo($id) {
    $this->AuthLogin();
     
  
      $edit_logo = DB::table('Logo')->where('id', $id)->get();
  
      $manager_logo = view('admin.logo.editlogo')->with('edit_logo', $edit_logo);
     
      return view('admin')->with('admin.logo.editlogo', $manager_logo);
  }
  public function update_logo (Request $request, $id) {
   $this->AuthLogin();
      $data = array();
      $data['name'] = $request->name;
      $data['stt'] = $request->stt; 
      $data['img'] = $request->img;  
      $get_image = $request->file('img');
  
      if($get_image){
        $get_name_image = $get_image->getClientOriginalName();
       $name_image = current(explode('.',$get_name_image));
        $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        $get_image->move('public/Img/logo',$new_image);
      $data['img'] = $new_image;
          DB::table('Logo')->where('id',$id)->update($data);
          Session::put('message','sửa logo thành công');
          return Redirect::to('all-logo');
      }
  
      DB::table('Logo')->where('id', $id)->update($data);
      Session::put('message', 'Cập nhật sản phẩm thành công');
      return Redirect::to('all-logo');
  }
  public function delete_logo($id) {
     $this->AuthLogin();
      DB::table('Logo')->where('id', $id)->delete();
      Session::put('message', 'Xóa sản phẩm thành công');
      return Redirect::to('all-logo');
  } 
  
  
  
  
  }
  