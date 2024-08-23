<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => [
                'required',
                'min:8',
                'string',
            ]
        ]);

        if (auth()->attempt(array('email' => $input['email'], 'password'=> $input['password']))) {
            
            alert()->toast('Welcome' . '<b>' . Auth::user()->email . '</b>' . ', you have been successfully logged in!', 'success')->position('top-end');
            return redirect()->route('home');

        } else {
            return redirect()->route('login')
                ->withErrors('Email atau Password Salah.');
        }
    }
}
