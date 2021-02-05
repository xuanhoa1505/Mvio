<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
use PDF;

class OrderController extends Controller
{
    public function AuthLogin(){
        $id = Session::get('id');
          if($id){
            return Redirect::to('dashboard');
          }else{
            return Redirect::to('admin')->send();
        }
      }
  //     public function print_order($id){
	// 	$pdf = \App::make('dompdf.wrapper');
	// 	$pdf->loadHTML($this->print_order_convert($id));
	// 	return $pdf->stream();
  //   }
  //   public function print_order_convert($id){
	// 	$details_order = DB::table('order')
  //       ->join('User','User.id','=','order.user_id')
  //       ->join('Receiver','Receiver.ord_id','=','order.id')
  //       ->select('order.*', 'User.name AS nameUser', 'User.address AS addressUser', 'User.phone AS phoneUser', 'User.email AS emailUser','Receiver.name AS nameReceiver', 'Receiver.address AS addressReceiver', 'Receiver.phone AS phoneReceiver', 'Receiver.email AS emailReceiver')
  //       ->where('order.id',$id)->get();
  //       $all_pro = DB::table('order_details')
  //       ->join('Product','Product.id','=','order_details.id_pro')
  //       ->select('order_details.*', 'Product.name AS nameProduct', 'Product.ma AS maProduct','Product.price AS priceProduct', 'Product.price_sale AS price_saleProduct')
  //       ->where('order_details.ord_id',$id)->get();
  //         return view('admin.order.print')->with('all_pro',$all_pro)->with('details_order',$details_order);

	// }
      public function index(){
        $order  = DB::table('order')
        ->join('User','User.id','=','order.user_id')
        ->select('order.*', 'User.name AS nameUser')->orderby('order.id','desc')->get(); 
        return view('admin.order.order')->with('order', $order);  
     
    }
    public function unactive_order($id){
        $this->AuthLogin();
        DB::table('order')->where('id',$id)->update(['stt'=>1]);
        Session::put('message','Đơn hàng đã duyệt');
        return Redirect::to('order');
  
    }
    public function active_order($id){
        $this->AuthLogin();
        DB::table('order')->where('id',$id)->update(['stt'=>0]);
        Session::put('message','Đơn hàng chưa duyệt');
        return Redirect::to('order');
    }
    public function activer_order($id){
        $this->AuthLogin();
        DB::table('order')->where('id',$id)->update(['stt'=>2]);
        Session::put('message','Đơn hàng chưa duyệt');
        return Redirect::to('order');
    }
   
    public function delete_order($id) {
        $this->AuthLogin();
        DB::table('order')->where('id', $id)->delete();
        Session::put('message', 'Xóa  thành công');
        return redirect()->back();  
    } 
    public function details_order($id , Request $request){
        $this->AuthLogin();
        $details_order = DB::table('order')
        ->join('User','User.id','=','order.user_id')
        ->join('Receiver','Receiver.ord_id','=','order.id')
        ->select('order.*', 'User.name AS nameUser', 'User.address AS addressUser', 'User.phone AS phoneUser', 'User.email AS emailUser','Receiver.name AS nameReceiver', 'Receiver.address AS addressReceiver', 'Receiver.phone AS phoneReceiver', 'Receiver.email AS emailReceiver')
        ->where('order.id',$id)->get();
        $all_pro = DB::table('order_details')
        ->where('order_details.ord_id',$id)->get();
          return view('admin.order.details_order')->with('all_pro',$all_pro)->with('details_order',$details_order);
      }
}
