<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', \App\Livewire\HomePage::class);
Route::get('/categories', \App\Livewire\CategoriesPage::class);
Route::get('/products', \App\Livewire\ProductsPage::class);
Route::get('/cart', \App\Livewire\CartPage::class);
Route::get('/products/{product}', \App\Livewire\ProductDetailPage::class);
Route::get('/checkout', \App\Livewire\CheckoutPage::class);
Route::get('/my-orders', \App\Livewire\MyOrdersPage::class);


Route::get('/my-orders/{order}', \App\Livewire\MyOrderDetailPage::class);
