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
        public function AuthLogin(){
            $id = Session::get('id');
            if($id){
                return Redirect::to('dashboard');
            }else{
                return Redirect::to('admin')->send();
            }
        }
        public function index(){
            
            return view('login_admin');
        }
        public function show_dashboard(){
            $order  = DB::table('order')
            ->join('User','User.id','=','order.user_id')
            ->select('order.*', 'User.name AS nameUser')->orderby('order.id','desc')->paginate(2); 
            return view('admin.dashboard')->with('order', $order);  
        }



        public function indexx(){
           
         
        }
        
        public function dashboard(Request $request){
            $email = $request->email;
            $password = $request->password;
           
            $result = DB::table('User')->where('email',$email)->where('password',$password)->where('admin_stt','admin')-> first();
            if($result){
                Session::put('name',$result->name);
                Session::put('id',$result->id);
                Session::put('email',$result->email);
                Session::put('img',$result->img);
            
                return Redirect::to('/dashboard');
            }else{
                Session::put('message','Mật khẩu hoặc tài khoản bị sai.Làm ơn nhập lại');
                return Redirect::to('/admin');
            }
    
        }
        public function logout(){
            $this->AuthLogin();
            Session::put('name',null);
            Session::put('id',null);
            return Redirect::to('/admin');
        }
    
        public function all_admin(){
            $this->AuthLogin();
            $all_admin = DB::table('User')->where('admin_stt','admin')->get();
          $manager_admin  = view('admin.admin.listadmin ')->with('all_admin',$all_admin);
          return view('admin')->with('admin.admin.listadmin ', $manager_admin );
        
        }
        
            public function addadmin(){
                $this->AuthLogin();
                return view('admin.admin.addadmin');
            }
       

    
    public function save_admin(Request $request){
        $this->AuthLogin();
        $this->validate($request,
      [
          'name' => 'required',
          'email' => 'required|email|unique:User',
          'password' => 'required',
          'img'=>'required'
      ],

      [
          
          'password.required' => '* password không được để trống',
          'email.email'=>'* Email Chưa đúng định dạng',
          'email.unique'=>'* Email đã tồn tại',
          'name.required' => '* Name không được để trống',
          'img.required' => '* Hình ảnh không được để trống',
          

      ]);
      
         $data = array();
         $data['name'] = $request->name;
         $data['email'] = $request->email;
         $data['password'] = $request->password;
         $data['stt'] =1;
         $data['admin_stt'] ='admin';
        $data['slug'] =  str_slug($request->name);
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
            return Redirect::to('all-admin');
        }
         $data['img'] = '';
        DB::table('User')->insert($data);
         Session::put('message','Thêm Admin thành công');
        return Redirect::to('all-admin');
 
    }
    public function delete_admin($id) {
        $this->AuthLogin();
         DB::table('User')->where('id', $id)->delete();
         Session::put('message', 'Xóa  thành công');
         return Redirect::to('all-admin');
     }
     public function unactive_admin($id){
        $this->AuthLogin();
        DB::table('User')->where('id',$id)->update(['stt'=>1]);
        Session::put('message','Tài khoản được phép hoạt động');
        return Redirect::to('all-admin');
      
      }
      public function active_admin($id){
        $this->AuthLogin();
       DB::table('User')->where('id',$id)->update(['stt'=>0]);
       Session::put('message','Tài khoản không được phép hoạt động');
       return Redirect::to('all-admin');
      } 
}