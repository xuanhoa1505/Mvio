<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
session_start();

class CategoresController extends Controller
{
    public function AuthLogin(){
        $id = Session::get('id');
          if($id){
            return Redirect::to('dashboard');
          }else{
            return Redirect::to('admin')->send();
        }
      }
    public function index () {
        $this->AuthLogin();
        $categores1 = DB::table('categores')->where('level', 1)->get();
        $categores2 = DB::table('categores')->where('level', 2)->get();
        $categores3 = DB::table('categores')->where('level', 3)->get();
        return view('admin.categores.listcategores', compact('categores1', 'categores2', 'categores3'));
    }
    public function addCategoryLevel1() {
        $this->AuthLogin();
        return view('admin.categores.addcategorylevel1');
    }
    public function saveCategoryLevel1(Request $request) {
        $this->AuthLogin();
        $data = array();
        $data['name'] = $request->name;
        $data['slug'] = str_slug($request->name);
        $data['level'] = 1;
        $data['code'] = $request->code;
        $data['sub_categories'] = 'khong';  
        $get_image = $request->file('imgInp');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/Img/imgs',$new_image);
            $data['image'] = $new_image;
        } else {
            $data['image'] = null;
        }
        DB::table('categores')->insert($data);
        notify()->success('thêm danh mục thành công!');
        return Redirect::to('categores');
    }

    public function addCategoryLevel2($slug) {
        $this->AuthLogin();
        $category = DB::table('categores')->where('slug',$slug)->first();
        return view('admin.categores.addcategorylevel2', compact('category'));
    }
    public function saveCategoryLevel2($id, Request $request) {
        $this->AuthLogin();
        $category = DB::table('categores')->where('id', $id)->first();
        $data = array();
        $data['name'] = $request->name;
        $data['slug'] = $category->slug .'/' .str_slug($request->name);
        $data['level'] = 2;
        $data['code'] = $request->code;
        $data['sub_categories'] = 'khong';
        $data['id_category'] = $id;
        DB::table('categores')->insert($data);
        DB::table('categores')->where('id', $id)->update(['sub_categories' => 'co']);
        notify()->success('thêm danh mục thành công!');
        return Redirect::to('categores');
    }

    public function addCategoryLevel3($slug,$slug1) {
        $this->AuthLogin();
        $category = DB::table('categores')->where('slug',$slug.'/'.$slug1)->first();
        return view('admin.categores.addcategorylevel3', compact('category'));
    }
    public function saveCategoryLevel3($id, Request $request) {
        $this->AuthLogin();
        $data = array();
        $category = DB::table('categores')->where('id', $id)->first();
        $data['name'] = $request->name;
        $data['slug'] = $category->slug .'/' .str_slug($request->name);
        $data['level'] = 3;
        $data['code'] = $request->code;
        $data['sub_categories'] = 'khong';
        $data['id_category'] = $id;
        DB::table('categores')->insert($data);
        DB::table('categores')->where('id', $id)->update(['sub_categories' => 'co']);
        notify()->success('thêm danh mục thành công!');
        return Redirect::to('categores');
    }
    public function getUpdate($id) {
        $this->AuthLogin();
        $category = DB::table('categores')->where('id',$id)->first();
        return view('admin.categores.update', compact('category'));
    }
    public function postUpdate($id, Request $request) {
        $this->AuthLogin();
        $data = array();
        $data['name'] = $request->name;
        $data['code'] = $request->code;  
        $get_image = $request->file('imgInp');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/Img/imgs',$new_image);
            $data['image'] = $new_image;
        } else {
            $data['image'] = null;
        }
        DB::table('categores')->where('id', $id)->update($data);
        notify()->success('update danh mục thành công!');
        return Redirect::to('categores');
    }
    public function remove(Request $request)
    {
        if($request->id) {
            $categores1 = DB::table('categores')->where('id', $request->id)->first();
            if( $categores1->sub_categories == 'co') {
                $categores2 = DB::table('categores')->where('id_category', $request->id)->get();
                foreach($categores2 as $data) {
                    if( $data->sub_categories == 'co') {
                        DB::table('categores')->where('id_category', $data->id)->delete();            
                    }
                    DB::table('categores')->where('id', $data->id)->delete();
                }
            }
            DB::table('categores')->where('id', $request->id)->delete();
            notify()->success('Xóa danh mục thành công!');
            return response()->json([
                'success' => 'Xóa danh mục thành công!!'
            ]);
        }
    }
}
