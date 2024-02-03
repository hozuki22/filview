<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\ReviewController;

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

//ユーザー一覧フォロー機能
Route::post('/users/follow',[FollowController::class,'follow'])->name('user.followfunction');

//フォロワーユーザー一覧フォロー機能
Route::post('/follower_user/user_follow/{loginuser_follower}',[FollowController::class,'follower_follow'])->name('follower.followfunction');

//フォローユーザー一覧
Route::get('
',[FollowController::class,'index'])->name('follow.index');

//フォロワーユーザー一覧
Route::get('/follower/index',[FollowController::class,'followerindex'])->name('follower.index');

//ユーザー一覧画面フォロー解除
Route::post('/followuser/userindexdelete/{id}',[Followcontroller::class,'userindex_delete'])->name('user.followdeletefuncion');

//フォロー解除
Route::post('/followuser/delete/{follow_user}',[FollowController::class,'delete'])->name('follow.deletefunciton');

//仮映画一覧
Route::get('/cinema/index',[ReviewController::class,'cinemaindex'])->name('cinema.index');

//レビュー入力画面
Route::get('/review/create/{id}',[ReviewController::class,'create'])->name('review.create');

//レビュー登録機能
Route::post('/review/post/',[ReviewController::class,'review_store'])->name('review.post');

//レビュー詳細機能
Route::get('/review/detail/{id}',[ReviewController::class,'detail'])->name('review.detail');