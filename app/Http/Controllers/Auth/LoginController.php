<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected function redirectTo()
    {
        // if(Auth::user()->usertype == 'admin'){
        //     return 'dashboard';
        // }else{
        //     return 'home';
        // }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        return view('auth.login');
    }

    public function checklogin(Request $request)
    {
        $users = DB::table('tbreporterusers')->where('email', $request->email)->get();
        $this->validate($request, [
        'email'   => 'required|email',
        'password'  => 'required|alphaNum|min:3'
        ]);
        foreach($users as $user){
            // $user_data = array(
            //     'email'  => $request->get('email'),
            //     'password' => $request->get('password')
            // );
            $email = $request->get('email');
            $password = $request->get('password');
    
            if($user->email == $email && $user->password == $password)
            {
                return redirect('login/successlogin');
            }
            else
            {
                return back()->with('error', 'Wrong Login Details');
            }
        }
        

    }

    public function successlogin(Request $request)
    {
        $login = DB::table('tbreporterusers')->where('email', $request->get('email'))->first();
        
        if($login){
            if($login->isAdmin == 0){
                return view('adminpage.home');
            }else{
                return view('layouts.user.user_page');
            }
        }else{
            return '';
        }
        
        
    }

    public function logout()
    {
     Auth::logout();
     return view('auth.login');
    }
}
