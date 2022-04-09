<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RedirectsUsers;
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
            'g-recaptcha-response' => 'required|captcha'
        ]);
    }

    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

         $this->clearLoginAttempts($request);

         if ($response = $this->authenticated($request, $this->guard()->user())) {
             return $response;
            }

        
         if(Auth::user()->role == 'resident'){
             $redirectTo = '/resident/home';
         }else if(Auth::user()->role == 'admin'){
             $redirectTo = '/admin/home';
         }

         return $request->wantsJson()
                     ? new JsonResponse([], 204)
                     : redirect($redirectTo);
     }

     
}
