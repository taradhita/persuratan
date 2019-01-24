<?php

namespace App\Http\Controllers\SuperadminAuth;

use App\Http\Controllers\Controller;
//use Illuminate\Foundation\Auth\AuthenticatesUsers;
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

    //use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/superadmin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:superadmin')->except('logout');
    }

    protected function guard()
    {
        return Auth::guard('superadmin');
    }

    public function showLoginForm()
    {
        return view('superadmin.superadmin-auth.login');
    }

        /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request) {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required|min:6',
        ]);

        $credential = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::guard('superadmin')->attempt($credential, $request->member)) {
            return redirect()->intended(route('superadmin'));
        }
        return redirect()->back()->withInput($request->only('username', 'remember'));
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout() {
        Auth::guard('superadmin')->logout();
        return redirect('/superadmin/login');
    }
}
