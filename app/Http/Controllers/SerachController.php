<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;

use Illuminate\Http\Request;

class SerachController extends Controller
{
    //キーワード検索
    public function search(Request $request) {
        $keyword = $request->input('word');
        $client = new Client();
        $url = config('api_value.api_url');
        $method = config('api_value.api_method');
        $authorization = config('api_value.api_authorization');
        $response = $client->request($method, $url."3/search/multi?query=.$keyword.&include_adult=false&language=ja-JP", [
            'headers' => [
              'Authorization' => $authorization,
              'accept' => 'application/json',
            ],
        ]);
       $cinemas = $response->getBody();
       $cinemas = json_decode($cinemas,true);
 
        return view('search_result',compact('cinemas'));
    }

    
}
