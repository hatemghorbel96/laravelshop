<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

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



Route::get('/', [HomeController::class, 'index'])->name('home');

// verfiy paiment

Route::get('/verify_payment/{transaction_id}', [PaymentController::class, 'verify_payment'])->name('verify_payment');

Route::get('/complete_payment', [PaymentController::class, 'complete_payment'])->name('complete_payment');

//thankyou

Route::get('/thankyou', [PaymentController::class, 'thankyou'])->name('thankyou');

// cart

Route::get('/cart', [CartController::class, 'cart'])->name('cart');

Route::post('/addcart', [CartController::class, 'addcart'])->name('addcart');


Route::post('/remove_from_cart', [CartController::class, 'remove_from_cart'])->name('remove_from_cart');

Route::get('/remove_from_cart', function(){
    return redirect('/product/index');
});


Route::post('/edit_product_quantity', [CartController::class, 'edit_product_quantity'])->name('edit_product_quantity');

Route::get('/edit_product_quantity', function(){
    return redirect('/product/index');
});

Route::get('/addcart', function(){
    return redirect('/product/index');
});

//checkout

Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');

Route::post('/checkout', [CartController::class, 'place_order'])->name('place_order');

// payment

Route::get('/payment', [PaymentController::class, 'payment'])->name('payment');



//category

Route::post('/category/add', [CategoryController::class, 'AddCategory']);

Route::get('/category/form', [CategoryController::class, 'ShowCategory']);

// products

Route::post('/product/add', [ProductController::class, 'AddProduct']);

Route::get('/product/form', [ProductController::class, 'ShowProduct'])->name('AddProduct');

Route::get('/product/index', [ProductController::class, 'products'])->name('products');

Route::get('/product/show/{id}', [ProductController::class, 'show'])->name('show');


//orders
Route::get('/user_orders', [HomeController::class, 'user_orders'])->name('user_orders');

Route::get('/user_orders_details/{id}', [HomeController::class, 'user_orders_details'])->name('user_orders_details');

//search
Route::get('/search', [HomeController::class, 'search'])->name('search');


Route::post('/search_func', [HomeController::class, 'search_func'])->name('search_func');
Route::get('/search_func', function(){
    return redirect('/search');
});




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
