<?php

namespace App\Http\Controllers\Auth;

use JWTAuth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use Auth;
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

    public function showLoginForm(Request $request){
        
        return view('auth.login');
    }
    
    public function login(Request $request)
    {
        
        $email = $request->only('email');
        $credentials_api = $request->only('email', 'password');
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
        
            $token = auth()->guard('api')->attempt($credentials_api);
            $user =User::where('email', $email['email'])->first();
           
            if($user != null){
                User::where('email', $email['email'])->update(['api_token' => $token]);
            }
          
            $request->session()->regenerate();
 
            return redirect('/cek-role');
        }
        //valid credential
        
 		//Token created, return with success response and jwt token
         
        
    }
    
    public function logout()
    {
        auth()->logout();
        // hy
        return redirect('/');
    }
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::CEKROLE;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    function authenticated(Request $request, $user)
    {
        $credentials_api = $request->only('email', 'password');
        $token = auth()->guard('api')->attempt($credentials_api);
        return User::where('email', $email['email'])->update(['api_token' => $token]);

    }
}
