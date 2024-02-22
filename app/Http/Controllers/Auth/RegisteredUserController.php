<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\Pre_User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    // メール認証登録画面
    public function first_create(){
        return view('auth.first_auth');
    }

    public function token_create(Request $request){
        $request->validate([
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
       ]);

       $token = uniqid();
       $pre_user = new Pre_User();

       $pre_user->email = $request->input('email');
       $pre_user->hash = $token;
       $pre_user->save();

       $url = route('sendmail',$token);
    

       Mail::send(new SendMail($url,$pre_user->email));
    }

    public function sendmail(){
        return view('auth.secound-auth');
    }
    
     public function create(): View
    {
        $currentyear = date('Y');
        
        return view('auth.register', compact('currentyear'));
    }

    public function confirm(Request $request) {
        $request->validate([
            'user_name' => ['required', 'string', 'max:255','unique:'.User::class],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'year' => ['required'],
            'month' => ['required'],
            'day' => ['required'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
       ]);
       
        $user_name = $request->input('user_name');
        $email = $request->input('email');
        $password = $request->input('password');
        $birthday = new Carbon();
        $birthday = Carbon::create(
            $request->year, $request->month, $request->day
        );


        return redirect()->route('auth.first-auth')->with('flash_message','入力していただいたメールに登録フォームを送付しました。');
        
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {


        $birthday = new Carbon();
        $birthday = Carbon::create(
            $request->year, $request->month, $request->day
        );

        $user = User::create([
            'user_name' => $request->user_name,
            'email' => $request->email,
            'birthday' => $birthday,
            'password' => Hash::make($request->password),
        ]);
        event(new Registered($user));
        return redirect('complete');
    }

    public function complete(){
        return view('auth.user_create_complete');
    }


}
