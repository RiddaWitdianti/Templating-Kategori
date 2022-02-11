<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemTransaksiController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/home', function () {
  //  return view('welcome');
//});

Route::get('/home',[HomeController::class, 'index']);

Route::resource('kategori', KategoriController::class);


Route::resource('produk', ProdukController::class);

Route::resource('user', UserController::class);

Route::resource('transaksi', TransaksiController::class);

Route::resource('item_transaksi', ItemTransaksiController::class);

Route::resource('pembayaran', PembayaranController::class);

Route::get('/cloud/{nama}', function ($nama) {
    $minio = Storage::disk('minio');
    $response = Response::make($minio->get('/public/image'.'/'.$nama), 200);
    $arr = explode('.',Str::lower($nama));
    $file_extension = $arr[count($arr) - 1];
    $ctype="image/*";
  switch( $file_extension ) {
          case "gif": $ctype="image/gif"; break;
          case "png": $ctype="image/png"; break;
          case "jpg":
          case "jpeg": $ctype="image/jpeg"; break;
          case "svg": $ctype="image/svg+xml"; break;
      default:
      }
    $response->header("Content-Type", $ctype);
    return $response;
  })->name('cloud.image');;




