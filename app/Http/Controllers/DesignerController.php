<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class DesignerController extends Controller
{
    public function AuthLogin(){
      $id = Session::get('id');
        if($id){
          return Redirect::to('dashboard');
        }else{
          return Redirect::to('admin')->send();
      }
    }
  
    public function all_designer(){
        $this->AuthLogin();
        $all_designer = DB::table('Designer')->get();
        $manager_designer  = view('admin.designer.listdesigner')->with('all_designer',$all_designer);
        return view('admin')->with('admin.designer.listdesigner', $manager_designer );
  
    }
  
      public function adddesigner(){
        $this->AuthLogin();
        return view('admin.designer.adddesigner');
      }
      public function save_designer(Request $request){
          $this->AuthLogin();
          
           $data = array();
           $data['name'] = $request->name;
           $data['stt'] = $request->stt;
           $data['slug'] = str_slug($request->name);
       
          DB::table('Designer')->insert($data);
           Session::put('message','Thêm người dùng thành công');
          return Redirect::to('all-designer');
          
   
    }
  
    public function unactive_designer($id){
        $this->AuthLogin();
        DB::table('Designer')->where('id',$id)->update(['stt'=>1]);
        Session::put('message','Không kích hoạt loại đề tài thành công');
        return Redirect::to('all-designer');
  
    }
    public function active_designer($id){
        $this->AuthLogin();
        DB::table('Designer')->where('id',$id)->update(['stt'=>0]);
        Session::put('message','Kích hoạt loại đề tài thành công');
        return Redirect::to('all-designer');
    }
      
     public function edit_designer($id) {
        $this->AuthLogin();
        $edit_designer = DB::table('Designer')->where('id', $id)->get();
  
        $manager_designer = view('admin.designer.editdesigner')->with('edit_designer', $edit_designer);
     
        return view('admin')->with('admin.designer.editdesigner', $manager_designer);
     }
    public function update_designer (Request $request, $id) {
        $this->AuthLogin();
        $data = array();
        $data['name'] = $request->name;
        
        $data['slug'] =  str_slug($request->name);
  
        DB::table('Designer')->where('id', $id)->update($data);
        Session::put('message', 'Cập nhật sản phẩm thành công');
        return Redirect::to('all-designer');
    }
    public function delete_designer($id) {
        $this->AuthLogin();
        DB::table('Designer')->where('id', $id)->delete();
        Session::put('message', 'Xóa sản phẩm thành công');
        return Redirect::to('all-designer');
    } 
  
     public function details_designer($slug , Request $request){
        $this->AuthLogin();
        $details_designer = DB::table('Designer')
        ->where('designer.slug',$slug)->get();
        dd($details_designer);
        return view('admin.designer.show_details');
  
     }
  
  
}
