<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Review;

class ReviewController extends Controller
{
    public function cinemaindex(){
        $client = new Client();
        
        $response = $client->request('GET', 'https://api.themoviedb.org/3/movie/now_playing?language=ja-JP&page=3', [
            'headers' => [
              'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiI2ZGVhZGJjOTM3NmU5Y2ZiNGE0NzU1NGQxNzIyNTU5NiIsInN1YiI6IjY1Nzg1ZmM0MzVhNjFlMDBlMzVmODNiOCIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.IGuei2NuEaT4FV5jNkW0n5Vi_sT7okSEcSYDOr2OCAM',
              'accept' => 'application/json',
            ],
          ]);
        
        $films = $response->getBody();
        $films = json_decode($films,true);
        return view('test',compact('films'));
    }

    //レビュー入力画面
    public function create(Request $request){
      $title = $request->input('title');
      $cinema_code = $request->input('cinema_code');
      return view('review',compact('title','cinema_code'));
    }

    //レビュー登録機能
    public function review_store(ReviewRequest $request){
      
    }
}
