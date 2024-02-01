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
        $users = User::all()->except([\Auth::id()]);
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

    public function show($id){
        $user = User::find($id);
        return view('profile.userprofile',compact('user'));
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
        $user->user_id = $request->input('user_name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->birthday = $request->input('birthday');
        // $birthday = new Carbon();
        // $birthday = Carbon::create(
        //     $request->year, $request->month, $request->day
        // );
        // $user->birthday = $request->input('birthday');
        $user->save();

        return redirect()->route('userprofile', $user)->with('flash_message','ユーザー情報が更新されました。');
    }
}                            
