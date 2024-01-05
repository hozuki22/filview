<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FollowController;

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
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/userprofile/{id}',[UserController::class,'show'])->name('userprofile');
Route::post('/userprofile/update/{id}',[UserController::class,'update'])->name('userprofile.update');

//ユーザー一覧
Route::get('/users',[UserController::class,'index'])->name('user.index');
//ユーザーフォロー機能
Route::post('/users/follow',[FollowController::class,'follow'])->name('user.follow');

//フォローユーザー一覧
Route::get('/followuser/index',[FollowController::class,'index'])->name('follow.index');
//フォロワーユーザー一覧
Route::get('/follower/index',[FollowController::class,'followerindex']);
//フォロー削除
Route::post('/followuser/delete/{id}',[FollowController::class,'delete'])->name('follow.delete');