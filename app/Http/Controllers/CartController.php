<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class CartController extends Controller
{
    
        public function AuthLogin(){
            $id = Session::get('id');
            if($id){
                return Redirect::to('home');
            }else{
                return Redirect::to('')->send();
            }
        }

    public function index()
    {
 
        return view('home.cart');
    }
    public function addToCart($id)
    {
     

        $product = DB::table('Product')->find($id);
        $size = DB::table('Size_product')->where('id_pro',$product->id)->first();
        if(!$product) {
            abort(404);
        }
        $cart = session()->get('cart');
        // if cart is empty then this the first product
        if(!$cart) {
            $cart = [
                    $size->id => [
                        "id" => $product->id,
                        "name" => $product->name,
                        "image" => $product->img,
                        "price" => $product->price,
                        "price_sale" => $product->price_sale,
                        "sizeName" => $size->name,
                        "quantity" => 1,
                        "maxQuantity" => $size->soluong
                    ]
            ];
            session()->put('cart', $cart);
            notify()->success('Product added to cart successfully!');
            return redirect()->back();
        }
        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$size->id])) {
            $cart[$size->id]['quantity']++;
            session()->put('cart', $cart);
            notify()->success('Product added to cart successfully!');
            return redirect()->back();
        }
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$size->id] = [
            "id" => $product->id,
            "name" => $product->name,
            "image" => $product->img,
            "price" => $product->price,
            "price_sale" => $product->price_sale,
            "sizeName" => $size->name,
            "quantity" => 1,
            "maxQuantity" => $size->soluong
        ];
        session()->put('cart', $cart);
        notify()->success('Product added to cart successfully!');
        return redirect()->back();
    }
    public function addToCartDetail($id, Request $request) {
        $this->AuthLogin();

        $product = DB::table('Product')->find($id);
        if(!$product) {
            abort(404);
        }
        $cart = session()->get('cart');
        // // if cart is empty then this the first product
        if ($request->dataCart == '{}') {
            notify()->error('No product is selected!');
            return response()->json([
                'error' => 'No product is selected!'
            ]);
        }
        foreach(json_decode($request->dataCart) as $data) {
            $size = DB::table('Size_product')->find($data->idSize);
            if(!$cart) {
                $cart = [
                    $data->idSize => [
                        "id" => $product->id,
                        "name" => $product->name,
                        "image" => $product->img,
                        "price" => $product->price,
                        "price_sale" => $product->price_sale,
                        "sizeName" => $data->nameSize,
                        "quantity" => $data->quantity,
                        "maxQuantity" => $size->soluong
                    ]
                ];
                session()->put('cart', $cart);
            } else {
                // if cart not empty then check if this product exist then increment quantity
                if(isset($cart[$data->idSize])) {
                    $cart[$data->idSize]['quantity']+=$data->quantity;
                    session()->put('cart', $cart);
                } else {
                    // if item not exist in cart then add to cart with quantity = 1
                    $cart[$data->idSize] = [
                        "id" => $product->id,
                        "name" => $product->name,
                        "image" => $product->img,
                        "price" => $product->price,
                        "price_sale" => $product->price_sale,
                        "sizeName" => $data->nameSize,
                        "quantity" => $data->quantity,
                        "maxQuantity" => $size->soluong
                    ];
                    session()->put('cart', $cart);
                }
            }
        }
        notify()->success('Product added to cart successfully!');
        return response()->json([
            'success' => 'Product added to cart successfully!'
        ]);
    }
    public function update(Request $request)
    {
        

        $cart = session()->get('cart');
        foreach(json_decode($request->dataCart) as $data) {
            $cart[$data->idSize]["quantity"] = $data->quantity;
            session()->put('cart', $cart);
        }
        notify()->success('Cart updated successfully!');
        return response()->json([
            'success' => 'Cart updated successfully!'
        ]);
    }

    public function remove(Request $request)
    {
       

        if($request->id) {

            $cart = session()->get('cart');

            if(isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }
            notify()->success('Product removed successfully!');
            return response()->json([
                'success' => 'Product removed successfully!'
            ]);
        }
    }
}
