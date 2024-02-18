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
use Carbon\Carbon;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
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


        return view('auth.confirm', compact('user_name','email','birthday','password'));
        
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
