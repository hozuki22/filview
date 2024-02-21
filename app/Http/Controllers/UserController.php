<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Follower;
use Carbon\Carbon;

class UserController extends Controller
{
    //ユーザー一覧表示
    public function index(){
        $users = User::all()->except([Auth::id()]);
        $follow_users = new Follower();
        $follow_users = Follower::where('follower_id', '=', Auth::user()->id)->get();
        $followed_user[] = 0;
        if($follow_users->isNotEmpty()){
            foreach($follow_users as $follow_user){
                    $followed_user[] = $follow_user->followed_id;
            }  
        }
        $loginuser = Auth::user();
        return view('user.user_index', compact('users','follow_users','loginuser','followed_user'));
    }

    //ユーザー詳細画面
    public function show($id){
        $user = User::find($id);
        $year = substr($user->birthday,0,4);
        $month = substr($user->birthday,5,2);
        $day = substr($user->birthday,8,2);
        $login_user = Auth::user();
       
        //今年の年を取得
        $currentyear = date('Y');
        return view('profile.userprofile',compact('user','year','month','day','currentyear','login_user'));
    }

    public function update(Request $request)
    {
        //バリデーション
        $request->validate([
            'user_name' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $user = User::find($request->input('id'));
        $user->user_name = $request->input('user_name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $birthday = new Carbon();
        $birthday = Carbon::create(
            $request->year, $request->month, $request->day
        );
        $user->birthday = $birthday;
        $user->save();
       

        return redirect()->route('userprofile', $user)->with('flash_message','ユーザー情報が更新されました。');
    }
}                            
