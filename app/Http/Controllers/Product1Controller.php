<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
session_start();

class Product1Controller extends Controller
{
    public function all_product(){
       // $all_product = DB::table('Product')->get();
       $categores1 = DB::table('categores')->where('level', 1)->get();
       $categores2 = DB::table('categores')->where('level', 2)->get();
       $categores3 = DB::table('categores')->where('level', 3)->get();
       $cate_des = DB::table('Designer')->orderby('id','desc')->get();
        $all_product = DB::table('Product')
        ->join('Designer','Designer.id','=','Product.id_des')
       
        ->select('Product.*', 'Designer.name AS nameDesigner')
        ->orderby('Product.id','desc')->paginate(5);
        return view('admin.product.listproduct', compact('categores1', 'categores2', 'categores3','cate_des', 'all_product'));
  
    }
    public function save_product(Request $request){
        notify()->success('thêm danh mục thành công!');
        return response()->json([
            'success' => 'Xóa danh mục thành công!!'
        ]);
   }
}
