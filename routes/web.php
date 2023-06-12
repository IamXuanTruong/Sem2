<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\ListproductController;
use App\Http\Controllers\OrderController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

//  
Route::get('/',[CustomAuthController::class,'home'])->name('homepage'); 
Route::get('Lienhe', [CustomAuthController::class, 'Lienhe'])->name('Lienhe');
Route::get('blog', [CustomAuthController::class, 'blog'])->name('blog');
Route::get('cart', [CustomAuthController::class, 'cart'])->name('cart');
Route::get('Gioithieu', [CustomAuthController::class, 'Gioithieu'])->name('Gioithieu');
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('postlogin', [CustomAuthController::class, 'login'])->name('postlogin'); 
Route::get('signup', [CustomAuthController::class, 'signup'])->name('register-user');
Route::post('postsignup', [CustomAuthController::class, 'signupsave'])->name('postsignup'); 
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');
Route::get('dashboard', [CustomAuthController::class, 'dashboard']);
// product
Route::get('product', [ListproductController::class, 'product'])->name('product');
Route::get('detail/{id}', [ListproductController::class, 'detail'])->name('detail');
Route::post('search', [ListproductController::class, 'search'])->name('search');
// cart
Route::get('add_to_cart/{id}', [ListproductController::class, 'addToCart'])->name('add_to_cart');
Route::get('cart', [ListproductController::class, 'cart'])->name('cart');
Route::patch('update-cart', [ListproductController::class, 'update'])->name('update_cart');
Route::delete('remove-from-cart', [ListproductController::class, 'remove_from_cart'])->name('remove_from_cart');
//
Route::get('checkout', [CartController::class, 'checkout'])->name('checkout');
//
Route::post('Lienhe', [ContactController::class, 'submit'])->name('Lienhe');

Route::post('checkout', [CheckoutController::class, 'submitdl'])->name('submitdl');
Route::get('order', [CheckoutController::class, 'order'])->name('order');