<?php

use App\Http\Livewire\OrderList;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Products;
use Illuminate\Support\Facades\Artisan;

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
    return redirect()->route('dashboard');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', OrderList::class)->name('dashboard');
    Route::get('/products', Products::class)->name('products');
});

Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});
