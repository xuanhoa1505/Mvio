<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class HomeController extends Controller
{
    public function AuthLogin(){
        $id = Session::get('id');
        if($id){
            return Redirect::to('home');
        }else{
            return Redirect::to('')->send();
        }
    }
    public function index(){
        $this->AuthLogin();
        //$dts= Customers::all();

       $Bestsellers  = DB::table('Product')->where('muc','0')->orderby('id','desc')->get(); 
     $Newarrivals = DB::table('Product')->where('muc','1')->orderby('id','desc')->get(); 
        $Sales = DB::table('Product')->where('muc','2')->orderby('id','desc')->get(); 
       // $Logo = DB::table('Logo')->where('stt','1')->get();->with('Logo',$Logo) 
       return view('home.home')->with('Bestsellers', $Bestsellers )
        ->with('Newarrivals', $Newarrivals )->with('Sales', $Sales );
       // return view('home.home',compact('dts'));
    }

    public function productsByCategory($slug) {
        $product = DB::table('Product')
            ->join('list_categores','list_categores.id_product','=','Product.id')
            ->join('categores','categores.id','=','list_categores.id_category')
            ->join('imgs','imgs.id_pro','=','Product.id')
            ->select('Product.*','imgs.img AS image')
            ->where('categores.slug','=', $slug)->where('imgs.stt', 1)->get();
        $category = DB::table('categores')->where('slug',$slug)->first();
        $Logo = DB::table('Logo')->where('stt','1')->get();
        return view('home.productsbycategory', compact('Logo','product','category'));
    }
    public function productsByCategory1($slug,$slug1) {
        $product = DB::table('Product')
            ->join('list_categores','list_categores.id_product','=','Product.id')
            ->join('categores','categores.id','=','list_categores.id_category')
            ->join('imgs','imgs.id_pro','=','Product.id')
            ->select('Product.*','imgs.img AS image')
            ->where('categores.slug','=', $slug.'/'.$slug1)->where('imgs.stt', 1)->get();
        
        $category = DB::table('categores')->where('slug',$slug.'/'.$slug1)->first();
        $categores = DB::table('categores')->where('slug','=', $slug)->get();
        $Logo = DB::table('Logo')->where('stt','1')->get();
        return view('home.productsbycategory', compact('Logo','product','category','categores'));
    }
    public function productsByCategory2($slug,$slug1,$slug2) {
        $product = DB::table('Product')
            ->join('list_categores','list_categores.id_product','=','Product.id')
            ->join('categores','categores.id','=','list_categores.id_category')
            ->join('imgs','imgs.id_pro','=','Product.id')
            ->select('Product.*','imgs.img AS image')
            ->where('categores.slug','=', $slug.'/'.$slug1.'/'.$slug2)->where('imgs.stt', 1)->get();
        
        $category = DB::table('categores')->where('slug','=', $slug.'/'.$slug1.'/'.$slug2)->first();
        $categores = DB::table('categores')->where('slug',$slug)
                    ->orWhere('slug','=', $slug.'/'.$slug1)->get();
        $Logo = DB::table('Logo')->where('stt','1')->get();
        return view('home.productsbycategory', compact('Logo','product','category','categores'));
    }



}