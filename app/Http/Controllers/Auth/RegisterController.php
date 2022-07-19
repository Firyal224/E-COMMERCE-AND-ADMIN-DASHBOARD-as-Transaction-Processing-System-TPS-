<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    // use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::CEKROLE;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * show page register
     * this function is custom
     * @return void
    */
    public function showRegistrationForm(Request $request){
        
        return view('auth.register');
    }
   
    /**
     * Create a new user instance after a valid registration.
     * this function is custom registrasi
     * @param  array  $data
     * @return \App\Models\User
     */

    public function register(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
 
      
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ])->assignRole('user');
        
        $credentials_api = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $token = auth()->guard('api')->attempt($credentials_api);
            User::where('email', $request->input('email'))->update(['api_token' => $token]);  
            $request->session()->regenerate();
            return redirect('/cek-role');
        }
        
    }
   
}
