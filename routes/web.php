<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MasterBarangController;
use App\Http\Controllers\TransaksiBarangController;
use App\Http\Controllers\CrudUserController;
use phpDocumentor\Reflection\Types\Resource_;
use App\Http\Controllers\HomeController;
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

// Halaman Awal
Route::get('/', function () {
    return view('auth.login');
});

Route::get('index', function () {
    return view('admin/index');
});

Auth::routes();

Route::group(['middleware' => ['web']], function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // CRUD User
    Route::resource('/CrudUser', CrudUserController::class)->middleware('CekRole:admin');

    //Barang
    Route::get('/barang/barang_pdf', [MasterBarangController::class, 'barang_pdf'])->name('barang_pdf');
    Route::resource('/barang', MasterBarangController::class)->middleware('CekRole:admin');

    //Transaksi
    Route::get('/transaksi/transaksibarang_pdf/{id}', [TransaksiBarangController::class, 'transaksibarang_pdf'])->name('transaksibarang_pdf');
    Route::get('/transaksi/transaksi_pdf', [TransaksiBarangController::class, 'transaksi_pdf'])->name('transaksi_pdf');
    Route::resource('/transaksi', TransaksiBarangController::class);

});
