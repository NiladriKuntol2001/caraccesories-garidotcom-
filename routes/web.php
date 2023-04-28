<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\AdminController;

use App\Http\Controllers\UserprofileController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

route::get('/',[HomeController::class,'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

route::get('/redirect',[HomeController::class,'redirect']);
route::get('/view_category',[AdminController::class,'view_category']);
route::get('/view_garage',[AdminController::class,'view_garage']);
route::post('/add_category',[AdminController::class,'add_category']);
route::post('/add_garage',[AdminController::class,'add_garage']);
route::get('/delete_category/{id}',[AdminController::class,'delete_category']);
route::get('/delete_garage/{id}',[AdminController::class,'delete_garage']);
route::get('/view_product',[AdminController::class,'view_product']);
route::post('/add_product',[AdminController::class,'add_product']);
route::get('/show_product',[AdminController::class,'show_product']);
route::get('/delete_product/{id}',[AdminController::class,'delete_product']);
route::get('/update_product/{id}',[AdminController::class,'update_product']);
route::post('/update_product_confirm/{id}',[AdminController::class,'update_product_confirm']);
route::get('/view_recycle',[AdminController::class,'view_recycle']);
route::get('/order',[AdminController::class,'order']);
route::get('/see_homeservice',[AdminController::class,'see_homeservice']);
route::get('/see_garagebook',[AdminController::class,'see_garagebook']);
route::get('/delivered/{id}',[AdminController::class,'delivered']);
route::get('/search',[AdminController::class,'searchdata']);
route::get('/searchgaragebook',[AdminController::class,'searchdatagarage']);
route::get('/searchhomeservice',[AdminController::class,'searchdatahome']);
route::get('/resellsearch',[AdminController::class,'searchdataresell']);
route::get('/resellshow',[AdminController::class,'resellshow']);
route::get('/reselldelivered/{id}',[AdminController::class,'reselldelivered']);
route::get('/view_recycle_offers',[AdminController::class,'view_recycle_offers']);
route::get('/recyclesearch',[AdminController::class,'searchdatarecycle']);

route::get('/product_details/{id}',[HomeController::class,'product_details']);
route::get('/product_page',[HomeController::class,'product_page']);
route::post('/add_cart/{id}',[HomeController::class,'add_cart']);
route::get('/show_cart',[HomeController::class,'show_cart']);
route::get('/remove_cart/{id}',[HomeController::class,'remove_cart']);
route::get('/cash_order',[HomeController::class,'cash_order']);
route::get('/stripe/{totalprice}',[HomeController::class,'stripe']);
Route::post('stripe/{totalprice}',[HomeController::class,'stripePost'])->name('stripe.post');
route::get('/show_order',[HomeController::class,'show_order']);
route::get('/cancel_order/{id}',[HomeController::class,'cancel_order']);
route::get('/homeservice',[HomeController::class,'homeservice']);
route::post('/done_homeservice',[HomeController::class,'done_homeservice']);
route::get('/show_homeservice',[HomeController::class,'show_homeservice']);
route::get('/delete_homeservice/{id}',[HomeController::class,'delete_homeservice']);
route::get('/update_homeservice/{id}',[HomeController::class,'update_homeservice']);
route::post('/update_homeservice_confirm/{id}',[HomeController::class,'update_homeservice_confirm']);
route::get('/garage_book',[HomeController::class,'garage_book']);
route::post('/done_garage',[HomeController::class,'done_garage']);
route::get('/show_garagebook',[HomeController::class,'show_garagebook']);
route::get('/delete_garagebook/{id}',[HomeController::class,'delete_garagebook']);
route::get('/update_garagebook/{id}',[HomeController::class,'update_garagebook']);
route::post('/update_garagebook_confirm/{id}',[HomeController::class,'update_garagebook_confirm']);
route::get('/show_profile',[HomeController::class,'show_profile']);
route::get('/resell_product',[HomeController::class,'resell_product']);
route::get('/resell_details/{id}',[HomeController::class,'resell_details']);
route::post('/resell_order/{id}',[HomeController::class,'resell_order']);
route::get('/show_resell_order',[HomeController::class,'show_resell_order']);
route::get('/cancel_resell/{id}',[HomeController::class,'cancel_resell']);

route::get('/view_resell',[UserprofileController::class,'view_resell']);
route::post('/add_resell',[UserprofileController::class,'add_resell']);
route::get('/show_resell',[UserprofileController::class,'show_resell']);
route::get('/delete_resell/{id}',[UserprofileController::class,'delete_resell']);
route::get('/update_resell/{id}',[UserprofileController::class,'update_resell']);
route::post('/update_resell_confirm/{id}',[UserprofileController::class,'update_resell_confirm']);
route::get('/view_recycle',[UserprofileController::class,'view_recycle']);
route::post('/add_recycle',[UserprofileController::class,'add_recycle']);
route::get('/show_recycle',[UserprofileController::class,'show_recycle']);
route::get('/delete_recycle/{id}',[UserprofileController::class,'delete_recycle']);
route::get('/update_recycle/{id}',[UserprofileController::class,'update_recycle']);
route::post('/update_recycle_confirm/{id}',[UserprofileController::class,'update_recycle_confirm']);
route::get('/profiledetails',[UserprofileController::class,'profiledetails']);
route::post('/add_profile',[UserprofileController::class,'add_profile']);
route::get('/view_profile',[UserprofileController::class,'view_profile']);