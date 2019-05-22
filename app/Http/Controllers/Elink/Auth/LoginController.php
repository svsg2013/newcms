<?php

namespace App\Http\Controllers\Elink\Auth;

use Auth;
use App\Models\ElCompany;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $redirectTo = '/e-link';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       	// $this->middleware('guest:e-link');
        $this->middleware('guest:e-link',['except' => ['logout']]);
    }

    public function login()
    {
    	return view('elink.auth.login');
    }

    public function postlogin(Request $request)
    {
      
      	$this->validate($request, [
	        'email'   => 'required|email',
	        'password' => 'required|min:6'
      	]);

        if (Auth::guard('e-link')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
           
            return view('elink.layouts.master');
        }
          
        return redirect()->back()->withInput($request->only('email', 'remember'));
        
    }

    public function logout(Request $request)
    {
        Auth::guard('e-link')->logout();
        return redirect('/e-link/login');
    }
}
