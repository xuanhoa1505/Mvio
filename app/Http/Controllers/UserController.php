<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class UserController extends Controller
{
  public function AuthLogin(){
    $id = Session::get('id');
    if($id){
        return Redirect::to('dashboard');
    }else{
        return Redirect::to('admin')->send();
    }
  }

  public function all_user(){
    $this->AuthLogin();
    $all_user = DB::table('User')->where('admin_stt','user')->get();
  $manager_user  = view('admin.user.listuser')->with('all_user',$all_user);
  return view('admin')->with('admin.user.listuser', $manager_user );

}

    public function adduser(){
      $this->AuthLogin();
    	return view('admin.user.adduser');
    }
    public function save_user(Request $request){
        $this->AuthLogin();
        $this->validate($request,
      [
          'name' => 'required',
          'email' => 'required|email|unique:User',
          'password' => 'required',
          'birth_day'=>'required',
          'address'=>'required',
          'gioitinh'=>'required',
          'stt'=>'required',
          'img'=>'required'
      ],

      [
          
          'password.required' => '* password không được để trống',
          
          'phone.integer' => '* phone chỉ được nhập số',
          'email.email'=>'* Email Chưa đúng định dạng',
          'email.unique'=>'* Email đã tồn tại',
          'name.required' => '* Name không được để trống',
          'birth_day.required' => '* Ngày sinh không được để trống',
          'gioitinh.required' => '* Không được để trống',
          'stt.required' => '* Không được để trống',
          'phone.required' => '* phone không được để trống',
          'img.required' => '* Hình ảnh không được để trống',
          

      ]);
      
         $data = array();
         $data['name'] = $request->name;
         $data['email'] = $request->email;
         $data['password'] = $request->password;
         $data['birth_day'] = $request->birth_day;
         $data['address'] = $request->address;
         $data['gioitinh'] = $request->gioitinh;
         $data['stt'] = $request->stt;
        $data['slug'] =  str_slug($request->name);
         $data['phone'] = $request->phone; 
         $data['admin_stt'] ='user'; 
         $data['img'] = $request->img;  
         $get_image = $request->file('img');
      
     if($get_image){
             $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
             $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
             $get_image->move('public/Img/user',$new_image);
           $data['img'] = $new_image;
             DB::table('User')->insert($data);
             Session::put('message','Thêm ảnh thành công');
            return Redirect::to('all-user');
        }
         $data['img'] = '';
        DB::table('User')->insert($data);
         Session::put('message','Thêm người dùng thành công');
        return Redirect::to('all-user');
 
 }

 public function unactive_user($id){
  $this->AuthLogin();
  DB::table('User')->where('id',$id)->update(['stt'=>1]);
  Session::put('message','Tài khoản được phép hoạt động');
  return Redirect::to('all-user');

}
public function active_user($id){
  $this->AuthLogin();
 DB::table('User')->where('id',$id)->update(['stt'=>0]);
 Session::put('message','Tài khoản không được phép hoạt động');
 return Redirect::to('all-user');
}
    
public function edit_user($id) {
  $this->AuthLogin();
   

    $edit_user = DB::table('User')->where('id', $id)->get();

    $manager_user = view('admin.user.edituser')->with('edit_user', $edit_user);
   
    return view('admin')->with('admin.user.edituser', $manager_user);
}
public function update_user (Request $request, $id) {
 $this->AuthLogin();
    $data = array();
    $data['name'] = $request->name;
    $data['email'] = $request->email;
    $data['password'] = $request->password;
    $data['birth_day'] = $request->birth_day;
    $data['address'] = $request->address;
    $data['gioitinh'] = $request->gioitinh;
    $data['stt'] = $request->stt;
    $data['slug'] =  str_slug($request->name);
    $data['phone'] = $request->phone;  
    $data['admin_stt'] ='user'; 
    $data['img'] = $request->img;  
    $get_image = $request->file('img');

    if($get_image){
      $get_name_image = $get_image->getClientOriginalName();
     $name_image = current(explode('.',$get_name_image));
      $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
      $get_image->move('public/Img/user',$new_image);
    $data['img'] = $new_image;
        DB::table('User')->where('id',$id)->update($data);
        Session::put('message','sửa user thành công');
        return Redirect::to('all-user');
    }

    DB::table('User')->where('id', $id)->update($data);
    Session::put('message', 'Cập nhật sản phẩm thành công');
    return Redirect::to('all-user');
}
public function delete_user($id) {
   $this->AuthLogin();
    DB::table('User')->where('id', $id)->delete();
    Session::put('message', 'Xóa sản phẩm thành công');
    return Redirect::to('all-user');
} 

public function details_user($slug , Request $request){
  $this->AuthLogin();

  $details_user = DB::table('User')
  ->where('User.slug',$slug)->get();
   dd($details_user);
  return view('admin.user.show_details');

}


}
