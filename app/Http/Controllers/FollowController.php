<?php

namespace App\Http\Controllers;
use App\Models\Follower;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class FollowController extends Controller
{
    public function follow(Request $request){
        $follower = new follower();
        $follower->follower_id = Auth::user()->user_id;
        $follower->followed_id = $request->input('user_id');
        $follower->save();

        return redirect()->route('user.index')->with('flash_message', 'フォローしました。');
    }

    //フォローユーザー一覧ページ
    public function index(){
        $followusers = DB::table('followers')->where('follower_id','=',Auth::user()->user_id)->get();
        //dd($followusers);
        return view('followindex', compact('followusers'));
    }
    //フォロワーユーザー一覧ページ
    public function followerindex(){
        $followerusers = DB::table('followers')->where('followed_id','=',Auth::user()->user_id)->get();
        return view('followerindex',compact('followerusers'));
    }

    public function delete($id){
        $followuser = DB::table('followers')->where('id',"=",$id)->delete();
        return redirect()->route('follow.index')->with('flash_message', 'フォローを解除しました。');

    }

}
