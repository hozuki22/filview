<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\WantToSeeList; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;

class WantToWatchListController extends Controller
{
    //見たいリスト一覧画面
    public function index(){
        //ログインしているユーザーの見たいリストを全データを取得
        $user_want_see_lists = WantToSeeList::where('user_id', '=', Auth::User()->id)->get();
        $login_user = Auth::user();
        if($user_want_see_lists->isNotEmpty()){
            foreach($user_want_see_lists as $user_want_see_list){
                $client = new Client();
                $url = config('api_value.api_url');
                $method = config('api_value.api_method');
                $authorization = config('api_value.api_authorization');
                $response = $client->request($method, $url."3/movie/".$user_want_see_list->cinema_code."?language=ja-JP", [
                    'headers' => [
                        'Authorization' => $authorization,
                        'accept' => 'application/json',
                    ],
                ]);
                $cinema = $response->getBody();
                $cinemas[] = json_decode($cinema,true);
            }
        }
        return view('seelist.index',compact('user_want_see_lists','cinemas','login_user'));
    }

    //見たいリスト登録機能
    public function store($id){
        //データ登録
        $post = new WantToSeeList();
        $post->user_id = Auth::user()->id;
        $post->cinema_code =$id;
        $post->sawflag = 0;
        $post->save();

        return redirect()->route('cinema.index')->with('flash_message','見たいリストに追加されました。');
    }

    //見たいリスト削除
    public function delete(){

    }
}
