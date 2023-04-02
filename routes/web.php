<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware;
use App\Providers;

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



// 会員登録画面
Route::get('/account/register', [App\Http\Controllers\AccountController::class, 'showRegister'])->name('showRegister');

// 会員登録ボタン
Route::post('/account/register', [App\Http\Controllers\AccountController::class, 'register'])->name('register');

//ログイン画面を表示
Route::get('/', [App\Http\Controllers\AccountController::class, 'login'])->name('login');

//ログインボタン
Route::post('/account/auth', [App\Http\Controllers\AccountController::class, 'auth']);

//ログアウト
Route::get('/logout', [App\Http\Controllers\AccountController::class, 'logout']);

// ユーザーのみ
Route::group(['middleware' => 'auth'], function () {

    //ホーム
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

    // 商品一覧画面を表示
    Route::get('/search', [App\Http\Controllers\SearchController::class, 'index'])->name('search');

    // 詳細画面の表示
    Route::get('/search/details/{id}', [App\Http\Controllers\SearchController::class, 'detail'])->name('details');

});

// 管理者ユーザーのみ
Route::group(['middleware' => ['auth', 'can:isAdmin']], function () {

    //ユーザー一覧画面
    Route::get('/user', [App\Http\Controllers\UserController::class, 'index']);
    //ユーザー情報編集画面
    Route::get('/user/edit/{id}', [App\Http\Controllers\UserController::class, 'edit']);
    Route::post('/user/update', [App\Http\Controllers\UserController::class, 'store']);
    //ユーザー情報削除ボタン
    Route::post('/user/userDelete/{id}', [App\Http\Controllers\UserController::class, 'userDelete']);
    //ユーザー一覧画面へ戻るボタン
    Route::get('/user/back', [App\Http\Controllers\UserController::class, 'back']);

    //商品管理
    Route::get('/item', [App\Http\Controllers\ItemController::class, 'item'])->name('items.item');
    //商品登録画面
    Route::get('/item/create', [App\Http\Controllers\ItemController::class, 'create'])->name('item.create');
    Route::post('/item/store/', [App\Http\Controllers\ItemController::class, 'store'])->name('item.store');
    //商品変更画面
    Route::get('/item/edit/{item}', [App\Http\Controllers\ItemController::class, 'edit'])->name('item.edit');
    Route::put('/item/edit/{item}', [App\Http\Controllers\ItemController::class, 'update'])->name('item.update');
    //商品削除ボタン
    Route::delete('/item/destroy/{item}', [App\Http\Controllers\ItemController::class, 'destroy'])->name('item.destroy');

});