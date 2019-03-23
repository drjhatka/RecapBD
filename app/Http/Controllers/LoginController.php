<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Session;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function loginForm(){
        //flush auth data
        $this->logout();
        return view('backend.login');
    }


    protected function guard()
    {
        return Auth::guard('admin')->except('logout');
    }

    public function login(Request $request){
                // create our user data for the authentication
                $userdata = array(
                    'admin_id'     => $request->get('user_id'),
                    'password'  => $request->get('password')
                );

                // attempt to do the login
                if (auth()->guard('admin')->attempt($userdata)) {
                    // validation successful!
                    // redirect them to the secure section or whatever
                        return redirect()->route('dashboard');
                }
                else {
                    // validation not successful, send back to form
                    return redirect('login')->with('login_error','Wrong Login Credentials, Try Again!');

                }

        }//end method

        public function logout(){
            auth('admin')->logout();
            //dd(auth('admin')->check());
            return redirect()->route('login');
        }





}
