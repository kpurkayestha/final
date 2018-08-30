<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Auth;
use App\User;

class AdminAuthController extends Controller
{
    // admin registration

    public function register(Request $request)
    {
    	$this->validation($request);
    	$this->create($request);
    	return redirect()->route('admin.profile');
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
        return Admin::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    // admin login

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
        ]);



        $data = array('email' =>  $request->email, 'password' => $request->password );
        
        $admin = User::where('email',$request->email)->first();    
        if ($admin  != null ) {
            if ($admin->role == "User") {
                return redirect()->route('admin.login')->with('error', 'You are not an admin.');
            }
            else{
                if (Auth::attempt($data)){
                return redirect()->route('admin.dashboard');
                }
                else{
                    return redirect()->route('admin.login')->with('error', 'Something went happens');
                }
            }
        }
        else{
            return redirect()->route('admin.login')->with('error', 'Something went happens');
        }
    }
}
