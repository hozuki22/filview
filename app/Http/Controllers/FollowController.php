<?php

namespace App\Http\Controllers;
use App\Models\Follower;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class FollowController extends Controller
{
    //フォロー機能
    public function follow(Request $request){
        $follower = new follower();
        $follower->follower_id = Auth::user()->user_id;
        $follower->followed_id = $request->input('user_id');
        $follower->followflag = 1;

        
        $follower = Follower::withTrashed()->updateOrCreate(
            ['follower_id' => $follower->follower_id, 'followed_id' => $follower->followed_id],
            ['deleted_at' => null],
        );

        return redirect()->route('user.index')->with('flash_message', 'フォローしました。');
    }

    //フォローユーザー一覧ページ
    public function index(){
        $followusers = Follower::where('follower_id', '=',Auth::user()->user_id)->get();
        return view('followindex', compact('followusers'));
    }
    //フォロワーユーザー一覧ページ
    public function followerindex(){
        $followerusers = new follower();
        $followerusers = Follower::where('followed_id','=',Auth::user()->user_id)->get();
        return view('followerindex',compact('followerusers'));
    }

    //フォロー解除機能
    public function delete(Follower $followuser){
        $followeuser = Follower::find($followuser->id);
        $followuser->followflag = 0;
        $followuser->delete();
        $followuser->save();
        return redirect()->route('follow.index')->with('flash_message', 'フォローを解除しました。');
    }

}
