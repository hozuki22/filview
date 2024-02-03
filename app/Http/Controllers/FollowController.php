<?php

namespace App\Http\Controllers;
use App\Models\Follower;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class FollowController extends Controller
{
    //ユーザー一覧フォロー機能
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

    //フォロワーユーザーフォロー機能
    public function follower_follow(Follower $follower,$follower_user){
        $user = User::where('user_name',"=",$follower_user)->first();
        $follower = Follower::withTrashed()->updateOrCreate(
            ['follower_id' => Auth::user()->id, 'followed_id' => $user->id],
            ['deleted_at' => null],
        );
        return redirect()->route('user.followfunction')->with('flash_message','フォローしました');
    }

    //フォローユーザー一覧ページ
    public function index(){
        $follow_users = Follower::where('follower_id', '=',Auth::user()->id)->get();
        if($follow_users->isNotEmpty()){
            foreach($follow_users as $follow_user){
            $user = User::where('id','=',$follow_user->followed_id)->first();
            $count_follow_user = Follower::where('follower_id','=',$user->id)->count();
            $count_follower_user = Follower::where('followed_id','=',$user->id)->count();
            dd($count_follow_user);
            $followed_users[] = $user->user_name;
            }
        }else{
            $followed_users = null;
        }
        return view('user.follow_index', compact('followed_users','count_follow_user','count_follower_user'));
    }
    //フォロワーユーザー一覧ページ
    public function followerindex(){
        //フォロワーユーザーの取り出し
        $follower_users = new follower();
        $follower_users = Follower::where('followed_id','=',Auth::user()->id)->get();        
        if($follower_users->isNotEmpty()){
            foreach($follower_users as $follower_user){
                $follower_user_name = User::where('id','=',$follower_user->follower_id)->first();
                $loginuser_followers[] = $follower_user_name->user_name;
            }
        }else{
            $loginuser_followers[] = 0;
        };
        //ログインユーザーがフォローしているユーザー名の取り出し
        $follow_users = new follower();
        $follow_users =Follower::where('follower_id', '=',Auth::user()->id)->get();
        if($follow_users->isNotEmpty()){
            foreach($follow_users as $follow_user){
                $follow_user_name = User::where('id', '=', $follow_user->followed_id)->first();
                $loginuser_follow_name[] = $follow_user_name->user_name;
            }
        }else {
            $loginuser_follow_name[] = 0;
        }
        return view('user.follower_index',compact('loginuser_followers','loginuser_follow_name'));
    }

    //ユーザー一覧画面ォロー解除機能
    public function userindex_delete(Follower $followuser,$id){
        $followeuser = Follower::where('followed_id','=',$id)->where('follower_id','=',Auth::user()->id)->delete();
        // $followuser->followflag = 0;
        return redirect()->route('user.index')->with('flash_message', 'フォローを解除しました。');
    }
    //フォロー一覧画面フォロー解除機能
    public function delete(Follower $followuser,$follow_user){
        $user = User::where('user_name','=',$follow_user)->first();
        $delete_user = $user->id;
        $followuser = Follower::where('followed_id', '=',$delete_user)->where('follower_id','=',Auth::user()->id)->first();
        $followuser->delete();
        return redirect()->route('follow.index')->with('flash_message', 'フォローを解除しました。');
    }

}
