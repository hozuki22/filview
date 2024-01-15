<?php

namespace App\Http\Controllers;
use App\Models\Follower;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class FollowController extends Controller
{
    //フォロー機能
    public function follow(Request $request){
        $follower = new follower();
        $follower->follower_id = Auth::user()->id;
        $follower->followed_id = $request->input('id');
        $follower->followflag = 1;        
        $follower = Follower::withTrashed()->updateOrCreate(
            ['follower_id' => $follower->follower_id, 'followed_id' => $follower->followed_id],
            ['deleted_at' => null],
        );
        return redirect()->route('user.index')->with('flash_message', 'フォローしました。');
    }

    //フォローユーザー一覧ページ
    public function index(){
        $followusers = Follower::where('follower_id', '=',Auth::user()->id)->first();
        $user = $followusers->followed_id->user->user_name;
        
        
        return view('followindex', compact('followusers'));
    }
    //フォロワーユーザー一覧ページ
    public function followerindex(){
        $followerusers = new follower();
        $followerusers = Follower::where('followed_id','=',Auth::user()->id)->get();
        dd($followerusers);
        return view('followerindex',compact('followerusers'));
    }

    //ユーザー一覧画面ォロー解除機能
    public function userindex_delete(Follower $followuser,$id){
        $followeuser = Follower::where('followed_id','=',$id)->where('follower_id','=',Auth::user()->id)->delete();
        // $followuser->followflag = 0;
        return redirect()->route('follow.index')->with('flash_message', 'フォローを解除しました。');
    }
    //フォロー一覧画面フォロー解除機能
    public function delete(Follower $followuser){
        $followeuser = Followフer::find($followuser->id);
        $followuser->delete();
        return redirect()->route('follow.index')->with('flash_message', 'フォローを解除しました。');
    }

}
