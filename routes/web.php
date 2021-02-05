<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\DesignerController;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ItemtypeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoresController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReceiverController;
use App\Http\Controllers\Order_detailsController;
use App\Http\Controllers\UpoadImageController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/hobme', function () {
    return view('welcome');
});

//home
Route::get('home', [HomeController ::class,'index']);
Route::get('shop/{slug}', [HomeController ::class,'productsByCategory']);
Route::get('/shop/{slug}/{slug1}', [HomeController ::class,'productsByCategory1']);
Route::get('/shop/{slug}/{slug1}/{slug2}', [HomeController ::class,'productsByCategory2']);
Route::get('/detail/{slug}',[DetailController::class,'detail']);
Route::get('/detail/{slugCategory}/{slug}.html',[DetailController::class,'detail1']);
Route::get('/detail/{slugCategory}/{slugCategory1}/{slug}.html',[DetailController::class,'detail2']);
Route::get('/detail/{slugCategory}/{slugCategory3}/{slugCategory2}/{slug}.html',[DetailController::class,'detail3']);
Route::get('add-to-cart/{id}', [CartController::class,'addToCart']);
Route::post('add-to-cart-detail/{id}', [CartController::class,'addToCartDetail']);
Route::patch('update-cart', [CartController::class,'update']);
Route::delete('remove-from-cart', [CartController::class,'remove']);
Route::get('cart', [CartController::class,'index']);
Route::get('/san-pham/{slug}',[CartController ::class,'addToCart']);

//login
Route::get('/', [LoginController::class,'index']);
//Route::get('home', [LoginController::class,'show_dashboard']);
Route::get('logoutuser',[LoginController::class,'logout']);
Route::post('login-welcome',[LoginController::class,'dashboard']);


//categores
Route::get('categores',[CategoresController::class,'index']);
Route::get('add-category-level-1',[CategoresController::class,'addCategoryLevel1']);
Route::post('save-category-level-1',[CategoresController::class,'saveCategoryLevel1']);
Route::get('add-category-level-2/{slug}',[CategoresController::class,'addCategoryLevel2']);
Route::post('save-category-level-2/{id}',[CategoresController::class,'saveCategoryLevel2']);
Route::get('add-category-level-3/{slug}/{slug1}',[CategoresController::class,'addCategoryLevel3']);
Route::post('save-category-level-3/{id}',[CategoresController::class,'saveCategoryLevel3']);
Route::delete('remove-category', [CategoresController::class,'remove']);



//admin

Route::get('/admin', [AdminController::class,'index']);
Route::get('dashboard', [AdminController::class,'show_dashboard']);
Route::get('logoutadmin',[AdminController::class,'logout']);
Route::post('admin-dashboard',[AdminController::class,'dashboard']);
Route::get('all-admin', [AdminController::class,'all_admin']);
Route::get('add-admin', [AdminController::class,'addadmin']);
Route::post('save-admin',[AdminController::class,'save_admin']);
Route::get('delete-admin/{id}',[AdminController::class,'delete_admin']);
Route::get('unactive-admin/{id}',[AdminController::class,'unactive_admin']);
Route::get('active-admin/{id}',[AdminController::class,'active_admin']);

//user
Route::get('add-user', [UserController::class,'adduser']);
Route::post('save-user',[UserController::class,'save_user']);
Route::get('unactive-user/{id}',[UserController::class,'unactive_user']);
Route::get('active-user/{id}',[UserController::class,'active_user']);
Route::get('all-user', [UserController::class,'all_user']);
Route::get('edit-user/{id}',[UserController::class,'edit_user']);
Route::get('delete-user/{id}',[UserController ::class,'delete_user']);
Route::post('update-user/{id}',[UserController::class,'update_user']);

//logo
Route::get('add-logo', [LogoController::class,'addlogo']);
Route::post('save-logo',[LogoController::class,'save_logo']);
Route::get('unactive-logo/{id}',[LogoController::class,'unactive_logo']);
Route::get('active-logo/{id}',[LogoController::class,'active_logo']);
Route::get('all-logo', [LogoController::class,'all_logo']);
Route::get('edit-logo/{id}',[LogoController::class,'edit_logo']);
Route::get('delete-logo/{id}',[LogoController ::class,'delete_logo']);
Route::post('update-logo/{id}',[LogoController::class,'update_logo']);



//designer
Route::get('add-designer', [DesignerController::class,'adddesigner']);
Route::post('save-designer',[DesignerController::class,'save_designer']);
Route::get('unactive-designer/{id}',[DesignerController::class,'unactive_designer']);
Route::get('active-designer/{id}',[DesignerController::class,'active_designer']);
Route::get('all-designer', [DesignerController::class,'all_designer']);
Route::get('edit-designer/{id}',[DesignerController::class,'edit_designer']);
Route::get('delete-designer/{id}',[DesignerController ::class,'delete_designer']);
Route::post('update-designer/{id}',[DesignerController::class,'update_designer']);


//product
Route::get('add-product', [ProductController::class,'addproduct']);
Route::post('save-product',[ProductController::class,'save_product']);
Route::get('unactive-product/{id}',[ProductController::class,'unactive_product']);
Route::get('active-product/{id}',[ProductController::class,'active_product']);
Route::get('all-product', [ProductController::class,'all_product']);
Route::get('edit-product/{id}',[ProductController::class,'edit_product']);
Route::get('delete-product/{id}',[ProductController ::class,'delete_product']);
Route::post('update-product/{id}',[ProductController::class,'update_product']);
Route::get('Invoicepro/{id}',[ProductController::class,'Invoicepro']);



//imgs
Route::get('add-imgs/{id}',[ImagesController ::class,'addimgs']);
Route::post('save-imgs',[ImagesController::class,'save_imgs']);
Route::get('delete-imgs/{id}',[ImagesController::class,'delete_imgs']);
Route::get('unactive-imgs/{id}',[ProductController::class,'unactive_imgs']);
Route::get('active-imgs/{id}',[ProductController::class,'active_imgs']);
//
//size
Route::get('add-size/{id}',[SizeController ::class,'addsize']);
Route::post('save-size',[SizeController::class,'save_size']);
Route::get('delete-size/{id}',[SizeController::class,'delete_size']);
Route::get('unactive-size/{id}',[SizeController::class,'unactive_size']);
Route::get('active-size/{id}',[SizeController::class,'active_size']);

//email
Route::get('send_mail',[MailController ::class,'index']);
Route::get('send_mailss',[MailController ::class,'indexuser']);
Route::post('/send/email',[MailController::class,'sendemail']);
Route::get('send_mail/{id}',[MailController ::class,'user']);
Route::post('/send/email/user',[MailController::class,'sendemailuser']);
//order
Route::get('order',[OrderController ::class,'index']);
Route::get('unactive-order/{id}',[OrderController::class,'unactive_order']);
Route::get('active-order/{id}',[OrderController::class,'active_order']);
Route::get('activer-order/{id}',[OrderController::class,'activer_order']);
Route::get('delete-order/{id}',[OrderController::class,'delete_order']);
Route::get('details/{id}',[OrderController::class,'details_order']);
Route::get('/print-order/{id}',[OrderController::class,'print_order']);

//receiver
Route::get('add-receiver/{id}',[ReceiverController ::class,'addreceiver']);
Route::post('save-receiver',[ReceiverController::class,'save_receiver']);
Route::get('delete-receiver/{id}',[ReceiverController::class,'delete_receiver']);
//ode_d
Route::get('add-ode_d/{id}',[Order_detailsController  ::class,'addode_d']);
Route::post('save-ode_d',[Order_detailsController ::class,'save_ode_d']);
Route::get('delete-order_details/{id}',[Order_detailsController ::class,'delete_ode_d']);
Route::get('edit-order_details/{id}',[Order_detailsController::class,'edit_ord_d']);
Route::post('update-order_details/{id}',[Order_detailsController::class,'update_ord_d']);