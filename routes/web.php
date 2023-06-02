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

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Route::get('/', function () {
//     return view('welcome');
// })->middleware(['verify.shopify'])->name('home');


Route::get('/login', function(){
    return view('login');
}) -> name("login");

// Route::get("/test", function(){
//    auth()->user()->api()->rest('GET','/admin/api/2023-04/products.json');
// });
Route::get("/test", function(){
   $product =  auth()->user()->api()->rest('GET','/admin/api/2023-04/products.json')['body'];
   return view("products",compact('product'));
})->middleware(['verify.shopify'])->name('test');

Route::get('/logs', function(){
    return "Here is logs";
})->name('logs');
