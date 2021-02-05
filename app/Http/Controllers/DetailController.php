<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class DetailController extends Controller
{
    public function AuthLogin(){
        $id = Session::get('id');
        if($id){
            return Redirect::to('home');
        }else{
            return Redirect::to('')->send();
        }
    }
    public function detail($slug) {
        $this->AuthLogin();
        $product = DB::table('Product')->where('slug',$slug)->first();
        $size = DB::table('size_product')->where('id_pro',$product->id)->get();
        $imgs = DB::table('imgs')->where('id_pro',$product->id)->get();
        $related_product = DB::table('Product')
        ->join('imgs','imgs.id_pro','=','Product.id')
        ->select('Product.*','imgs.img AS image')
        ->where('imgs.stt', 1)->paginate(4);
        return view('home.detail', compact('product', 'size', 'related_product','imgs'));
    }
    public function detail1($slugCategory, $slug) {
        $this->AuthLogin();
        $product = DB::table('Product')->where('slug',$slug)->first();
        $size = DB::table('size_product')->where('id_pro',$product->id)->get();
        $imgs = DB::table('imgs')->where('id_pro',$product->id)->get();
        $categores = DB::table('categores')->where('slug',$slugCategory)->get();
        $related_product = DB::table('Product')
        ->join('list_categores','list_categores.id_product','=','Product.id')
        ->join('categores','categores.id','=','list_categores.id_category')
        ->join('imgs','imgs.id_pro','=','Product.id')
        ->select('Product.*','imgs.img AS image')
        ->where('categores.slug',$slugCategory)
        ->where('imgs.stt', 1)->paginate(4);
        return view('home.detail', compact('product', 'size', 'related_product','categores','imgs'));
    }
    public function detail2($slugCategory, $slugCategory1, $slug) {
        $this->AuthLogin();
        $product = DB::table('Product')->where('slug',$slug)->first();
        $size = DB::table('size_product')->where('id_pro',$product->id)->get();
        $imgs = DB::table('imgs')->where('id_pro',$product->id)->get();
        $categores = DB::table('categores')->where('slug',$slugCategory)->orWhere('slug',$slugCategory.'/'.$slugCategory1)->get();
        $related_product = DB::table('Product')
        ->join('list_categores','list_categores.id_product','=','Product.id')
        ->join('categores','categores.id','=','list_categores.id_category')
        ->join('imgs','imgs.id_pro','=','Product.id')
        ->select('Product.*','imgs.img AS image')
        ->where('categores.slug',$slugCategory.'/'.$slugCategory1)
        ->where('imgs.stt', 1)->paginate(4);
        return view('home.detail', compact('product', 'size', 'related_product','categores','imgs'));
    }
    public function detail3($slugCategory, $slugCategory1, $slugCategory2, $slug) {
        $this->AuthLogin();
        $product = DB::table('Product')->where('slug',$slug)->first();
        $size = DB::table('size_product')->where('id_pro',$product->id)->get();
        $imgs = DB::table('imgs')->where('id_pro',$product->id)->get();
        $categores = DB::table('categores')->where('slug',$slugCategory)
                    ->orWhere('slug','=', $slugCategory.'/'.$slugCategory1)
                    ->orƯhere('slug',$slugCategory.'/'.$slugCategory1.'/'.$slugCategory2)->get();
        $related_product = DB::table('Product')
                    ->join('list_categores','list_categores.id_product','=','Product.id')
                    ->join('categores','categores.id','=','list_categores.id_category')
                    ->join('imgs','imgs.id_pro','=','Product.id')
                    ->select('Product.*','imgs.img AS image')
                    ->where('categores.slug',$slugCategory.'/'.$slugCategory1.'/'.$slugCategory2)
                    ->where('imgs.stt', 1)->paginate(4);
        return view('home.detail', compact('product', 'size', 'related_product','categores','img'));
    }
}
