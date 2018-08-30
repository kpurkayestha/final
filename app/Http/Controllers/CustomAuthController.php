<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class CustomAuthController extends Controller
{
    // user registration

    public function register(Request $request)
    {
    	$this->validation($request);
    	$this->create($request);
    	return redirect()->route('login');
    }

    public function validation($request)
    {
    	return $this->validate($request, [
	        'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
    	]);
    }

    protected function create($data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    // user login

    public function login(Request $request)
    {
        
        $this->validate($request, [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
        ]);

        $data = array('email' =>  $request->email, 'password' => $request->password );
        
        $user = User::where('email',$request->email)->first();    
        if ($user  != null ) {
            if ($user->role != "User") {
                return redirect()->route('login')->with('error', 'You are not a user.');
            }
            else{
                if (Auth::attempt($data)){
                    return redirect('/')->with('successMsg', 'You Have Successfully Logged In.');
                }
                else{
                    return redirect()->route('login')->with('error', 'Something went happens');
                }
            }
        }
        else{
            return redirect()->route('login')->with('error', 'This credentials does not matched.');
        }

    }
}
