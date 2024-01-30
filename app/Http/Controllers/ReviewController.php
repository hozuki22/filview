<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Review;
use App\Models\User;
use App\Http\Requests\ReviewStoreRequest;

class ReviewController extends Controller
{
  public function cinemaindex(){
    $client = new Client();
    $url = config('api_value.api_url');
    $method = config('api_value.api_method');
    $authorization = config('api_value.api_authorization');
    $response = $client->request($method, $url."3/movie/now_playing?language=ja-JP&page=3", [
        'headers' => [
          'Authorization' => $authorization,
          'accept' => 'application/json',
        ],
    ]);
    $cinemas = $response->getBody();
    $cinemas = json_decode($cinemas,true);
    return view('test',compact('cinemas'));
  }
    //レビュー入力画面
  public function create(Request $request,$id){
    $client = new Client();
    $url = config('api_value.api_url');
    $method = config('api_value.api_method');
    $authorization = config('api_value.api_authorization');
    $response = $client->request($method, $url."/3/movie/".$id."?language=ja-JP", [
      'headers' => [
        'Authorization' => $authorization,
        'accept' => 'application/json',
      ],
    ]);
    $cinema = $response->getBody();
    $cinema = json_decode($cinema,true);    
    return view('review',compact('cinema'));
  }

    //レビュー登録機能
  public function review_store(ReviewStoreRequest $request){
    $post = new Review();
    $post->user_id = Auth::user()->id;
    $post->review_id = Auth::user()->id;
    $post->cinema_code = $request->input('cinema_code');
    $post->point = $request->input('point');
    $post->review_comment = $request->input('review_comment');
    $post->save();
    return redirect()->route('cinema.index')->with('flash_message','レビューが投稿されました。');
  }

  //レビュー詳細機能
  public function detail(){
    $login_user_reviewes = Review::where('id','=',Auth::user()->id)->get();
    foreach($login_user_reviewes as $login_user_review){
      $user[] = $login_user_review->user->user_name;
    }
    
    $user = User::where('id','=',Auth::user()->id)->first();
    $reviews= $user->reviews;
  }
}
