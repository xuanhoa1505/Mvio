<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Validator;
use App\Models\ProductModel;
use App\Models\SizeModel;
use Illuminate\Support\Facades\Redirect;
session_start();

class ProductController extends Controller
{
    public function AuthLogin(){
      $id = Session::get('id');
        if($id){
          return Redirect::to('dashboard');
        }else{
          return Redirect::to('admin')->send();
      }
    }
  
    public function all_product(){
        $this->AuthLogin();
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
  
    public function addproduct(){
      $this->AuthLogin();
   
      
      $cate_des = DB::table('Designer')->orderby('id','desc')->get(); 
      
      
      $categores1 = DB::table('categores')->where('level', 1)->get();
      $categores2 = DB::table('categores')->where('level', 2)->get();
      $categores3 = DB::table('categores')->where('level', 3)->get();
      
      $manager_product  = view('admin.product.addproduct')->with('cate_des', $cate_des)
      ->with('cate_des', $cate_des)
      ->with('categores1', $categores1)
      ->with('categores2', $categores2)
      ->with('categores3', $categores3);
      return view('admin')->with('admin.product.addproduct', $manager_product );
     
    }
    public function save_product(Request $request){
        $this->AuthLogin();
        $validator = Validator::make($request->all(), 
        [
          'name' => 'required|unique:Product',
          'ma' => 'required|unique:Product',
          'categoryId' => 'required',
          'id_des'=>'required',
          'des' => 'required',
          'pro_nguyenlieu'=>'required',
          'price'=>'required|integer',
        ],
        [
          'required' => ':attribute không được để trống.',
          'unique' => ':attribute đã tồn tại.',
          'min' => ':attribute không được nhỏ hơn :min.',
          'max' => ':attribute không được lớn hơn :max.',
          'integer' => ':attribute khỉ được nhập số.',
          'mimes' => ':attribute phải có dạng jpeg, png, jpg, gif, svg.',
        ],
        [
          'name' => 'Tên sản phẩm',
          'ma' => 'Mã sản phẩm',
          'categoryId' => 'Danh mục',
          'id_des'=>'Nhà thiết kế',
          'des' => 'Mô tả sản phẩm',
          'pro_nguyenlieu'=>'Nguyên liệu',
          'price'=>'Giá gốc',
          'img' => 'Hình ảnh'
        ]);
        if ($validator->fails()){
          return response()->json([
            'error'=>$validator->errors()->all()
          ]);
        }
        $product = new ProductModel();
        $product->name = $request->name;
        $product->ma = $request->ma;
        $product->des = $request->des;
        $product->id_des = $request->id_des;
        $product->pro_stt = $request->pro_stt;
        $product->slug =  str_slug($request->name);
        $product->pro_nguyenlieu = $request->pro_nguyenlieu ;
        $product->price = $request->price;  
        $product->price_sale = $request->price_sale;  
        $product->muc = $request->muc;
        $get_image = $request->file('img');
    if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
           $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/Img/product',$new_image);
          $product->img = $new_image;
            $product->save();
      } else {
          $product->img = '';   
          $product->save();  
      }
      for ($x = 0; $x < $request->totalFiles; $x++) 
      { 
          if ($request->hasFile('files'.$x)) 
           {
              $image = array();
              $image['id_pro'] = $product->id;
              $file = $request->file('files'.$x);
              $get_name_image = $file->getClientOriginalName();
              $name_image = current(explode('.',$get_name_image));
              $new_image =  $name_image.rand(0,99).'.'.$file->getClientOriginalExtension();
              $file->move('public/Img/product',$new_image);
              $image['img'] = $new_image;
              if($request->checkImage == null) {
                if($x == 0) {
                  $image['stt'] = 1;
                } else {
                  $image['stt'] = 0;
                }
              } else {
                if($request->checkImage == $request['idFile'.$x]) {
                  $image['stt'] = 1;  
                } else {
                  $image['stt'] = 0;
                }
              }
              DB::table('imgs')->insert($image);
           }
      }
      foreach(json_decode($request->dataCategory) as $data) {
        $category = array();
        $category['id_category'] = $data;
        $category['id_product'] = $product->id;
        DB::table('list_categores')->insert($category);
      }
      foreach(json_decode($request->dataSize) as $data) {
        $size = array();
        $size['id_pro'] = $product->id;
        $size['name'] = $data->name;
        $size['soluong'] = $data->quantity;
        DB::table('size_product')->insert($size);
      }
      notify()->success('Thêm sản phẩm thành công thành công!');
      return response()->json([
          'success' => 'Thêm sản phẩm thành công thành công!'
      ]);
   }
 
    
  
    public function unactive_product($id){
        $this->AuthLogin();
        DB::table('Product')->where('id',$id)->update(['pro_stt'=>1]);
        Session::put('message','Cho phép sản phẩm hiển thi trang chủ');
        return Redirect::to('all-product');
  
    }
    public function active_product($id){
        $this->AuthLogin();
        DB::table('Product')->where('id',$id)->update(['pro_stt'=>0]);
        Session::put('message','Không phép sản phẩm hiển thi trang chủ');
        return Redirect::to('all-product');
    }
      
     public function edit_product($id) {
        $this->AuthLogin();
        $edit_product = DB::table('Product')
        ->join('Designer','Designer.id','=','Product.id_des')
        
        ->select('Product.*', 'Designer.name AS nameDesigner')->where('Product.id', $id)->get();
        $cate_des = DB::table('Designer')->orderby('id','desc')->get(); 
        $manager_product = view('admin.product.editproduct')->with('cate_des', $cate_des)->with('edit_product', $edit_product);
     
        return view('admin')->with('admin.product.editproduct', $manager_product);
     } 



     
    public function update_product (Request $request, $id) {
        $this->AuthLogin();
        $data = array();
        $data['name'] = $request->name;
        $data['ma'] = $request->ma;
        $data['des'] = $request->des;
        $data['id_des'] = $request->id_des;
 
        $data['slug'] =  str_slug($request->name);
        $data['pro_nguyenlieu '] = $request->pro_nguyenlieu ;
        $data['muc'] = $request->muc;  
        $data['img'] = $request->img; 
        $get_image = $request->file('img');
  
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
           $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/Img/product',$new_image);
          $data['img'] = $new_image;
              DB::table('Product')->where('id',$id)->update($data);
              Session::put('message','sửa product thành công');
              return Redirect::to('all-product');
          }
      
          DB::table('Product')->where('id', $id)->update($data);
          Session::put('message', 'Cập nhật sản phẩm thành công');
          return Redirect::to('all-product');
    }
    public function delete_product($id) {
        $this->AuthLogin();
        DB::table('Product')->where('id', $id)->delete();
        Session::put('message', 'Xóa sản phẩm thành công');
        return Redirect::to('all-product');
    } 
  
     public function Invoicepro($id , Request $request){
        $this->AuthLogin();
       
        $details_product = DB::table('Product')
        ->join('Designer','Designer.id','=','Product.id_des')
        ->where('Product.id',$id)
        ->select('Product.*', 'Designer.name AS nameDesigner')
        ->get();
      
        $details_img = DB::table('Imgs')->where('Imgs.id_pro', $id)->orderby('id', 'desc')->get();
        $details_size = DB::table('size_product')->where('size_product.id_pro', $id)->orderby('id', 'asc')->get();
        $manager_product = view('admin.product.Invoicepro')->with('details_size', $details_size)->with('details_img', $details_img)->with('details_product', $details_product); 
        return view('admin')->with('admin.product.Invoicepro', $manager_product);
  
     }
}

