<?php

// use App\Http\Controllers\loginController;
// use App\Http\Controllers\RegisController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Usermgt;

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




Route::get('/login', [Usermgt::class, 'login'])->name('login');
Route::get('/register', [Usermgt::class, 'register'])->name('register');
Route::post('/login-user', [Usermgt::class, 'loginUser'])->name('login-user');



Route::post('/register-user', [Usermgt::class, 'registerUser'])->name('register-user');



Route::get('/logout', [Usermgt::class, 'logout'])->name('logout');
Route::get('/products', [Usermgt::class, 'product'])->name('products');
Route::post('/productinsert', [Usermgt::class, 'productinsert'])->name('productinsert');
Route::get('/accounts', [Usermgt::class, 'account'])->name('accounts');
Route::get('/add-product', [Usermgt::class, 'addproduct'])->name('add-product');
Route::get('/edit-product/{id}', [Usermgt::class, 'edit'])->name('edit-product');
Route::put('/update-products/{id}', [Usermgt::class, 'updatepro']);
Route::get('/delete-product/{id}', [Usermgt::class, 'deletepro'])->name('delete-product');
Route::get('/showproduct', [Usermgt::class, 'showproducts'])->name('showproduct');
Route::get('/dashboards', [Usermgt::class, 'dashboard'])->name('dashboards');


Route::get('/product-trash', [Usermgt::class, 'undos'])->name('product-trash');

Route::get('/product-restore/{id}', [Usermgt::class, 'restores'])->name('product-restore');

Route::get('/force-delete/{id}', [Usermgt::class, 'forceDelete'])->name('force-delete');