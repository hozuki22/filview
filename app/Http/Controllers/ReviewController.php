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
  public function create($id){
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
    return view('review.review_create',compact('cinema'));
  }

    //レビュー登録機能
  public function review_store(ReviewStoreRequest $request){
    $post = new Review();
    $post->user_id = Auth::user()->id;
    $post->cinema_code = $request->input('cinema_code');
    $post->point = $request->input('point');
    $post->review_comment = $request->input('review_comment');
    $post->save();
    return redirect()->route('cinema.index')->with('flash_message','レビューが投稿されました。');
  }

  //レビュー詳細機能
  public function detail(Review $review_comment,$id){
    //映画詳細データの収集
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

    //映画のレビューデータ収集
    $review_comments = Review::where('cinema_code','=',$id)->get();
    return view('review.detail',compact('cinema','review_comments'));
  }
}
