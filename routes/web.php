<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use Shopify\Context;
use Shopify\Auth\FileSessionStorage;
use Shopify\Auth\Session;
use Shopify\Rest\Admin2023_04\Product;
use Shopify\Utils;

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

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

Context::initialize(
    apiKey: $_ENV['SHOPIFY_API_KEY'],
    apiSecretKey: $_ENV['SHOPIFY_API_SECRET'],
    scopes: $_ENV['SHOPIFY_APP_SCOPES'],
    hostName: $_ENV['SHOPIFY_APP_HOST_NAME'], //https://newstore-01-01.myshopify.com
    sessionStorage: new FileSessionStorage('C:\laragon\www\php-laravel-store\tmp\php-sessions'),
    apiVersion: '2023-04',
    isEmbeddedApp: true,
    isPrivateApp: false,
);

$requestHeaders = array( 
    'api_version' => '2023-01', 
    'X-Shopify-Access-Token' => '60534dea697fa304ba1a5c9ab9c048e2-1686478185',
    'authorization' => 'Bearer 60534dea697fa304ba1a5c9ab9c048e2-1686478185',
    // 'Content-Type' => 'application/json',
 );
$requestCookies = array();
$isOnline = true;

Route::get('/', function () {
    return view('welcome');
})->middleware(['verify.shopify'])->name('home');


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

// $this->test_session = Utils::loadCurrentSession(
//     $requestHeaders,
//     $requestCookies,
//     $isOnline
// );



Route::get("/products",function() {
    // $client = new Client();
    // $res = $client->request('GET','https://jsonplaceholder.typicode.com/users/1');
    // dd($res->getBody());

    // $response = Http::get('https://fakestoreapi.com/products/1');
    // $products = $response->json();

    // $product = new Product($this->test_session);
    // $product->title = "Burton Custom Freestyle 151";
    // $product->body_html = "<strong>Good snowboard!</strong>";
    // $product->vendor = "Burton";
    // $product->product_type = "Snowboard";
    // $product->status = "draft";
    // $product->save(
    //     true, // Update Object
    // );
    // return view('productsCollection',compact('products'));
})->middleware(['verify.shopify'])->name('products');



Route::get('/logs', function(){
    return "Here is logs";
})->name('logs');
