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
    public function index(){
        $users = User::all()->except([\Auth::id()]);
        $loginuser = Auth::user();
        $followusers = new Follower();
        $followusers = Follower::withTrashed()->where('follower_id', '=', Auth::user()->user_id)->get();
        return view('userindex', compact('users','followusers','loginuser'));
    }

    public function show($id){
        $user = User::find($id);
        return view('profile.userprofile',compact('user'));
    }

    public function update(Request $request)
    {
        //バリデーション
        $request->validate([
            'user_id' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $user = User::find($request->input('id'));
        $user->user_id = $request->input('user_id');
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
