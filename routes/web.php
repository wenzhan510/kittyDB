<?php

use Illuminate\Support\Facades\Route;
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

Route::resource('sheet', App\Http\Controllers\SheetController::class);

Route::resource('sheet.column', App\Http\Controllers\ColumnController::class);

Route::resource('sheet.content', App\Http\Controllers\ContentController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return redirect('/sheet');
});

Route::get('sheet_download', [App\Http\Controllers\SheetController::class, 'download'])->name('sheet.download');// 下载数据
