<?php

namespace App\Http\Controllers;

use App\Profilevisitor;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Validator;
use Carbon\Carbon;

class UserController extends Controller
{
     public function index()
    {
        $profilevisitor = Profilevisitor::where('user_id',Auth::id())->count();
        return view('user.profile',compact('profilevisitor'));
    }

     public function edit()
    {
        //

        return view('user.editprofile');
    }
    
    public function update(Request $request)
    {
        
        //
        
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'image' => 'image',            // |mimes: jpeg, jpg
            'about' => 'required|string|max:400',
            'university' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);
        $user = User::find(Auth::user()->id);


        $image = $request->file('image');
        $slug = str_slug($request->name);
        
        if (isset ($image)) {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
        
            if (!file_exists('uploads/user/images')) {
                mkdir('uploads/user/images', 0777, true);
            }
            
            if ($user->pro_pic != 'default.jpg'){
                unlink('uploads/user/images/'.$user->pro_pic); //delete file from the server
            }
            
            $image->move('uploads/user/images', $imagename);
        }
        else {
            $imagename = 'default.jpg';
        }
        
        
        $user->name = $request->name;
        $user->pro_pic = $imagename;
        $user->about = $request->about;
        $user->university = $request->university;
        $user->location = $request->location;
        //dd($request);
        $user->save();
        return redirect(route('user.profile'))->with('successMsg', 'Profile Successfully Updated.');
    
    }

    public function account(Request $request)
    {
        //
        //dd($request);
        $user = User::find(Auth::user()->id);
        //dd($user);
        //dd(bcrypt($request->oldpass), $user->password);
        if (password_verify($request->oldpass, $user->password)) {
            //dd($user);
            $this->validate($request, [
                'password' => 'required|string|min:6|confirmed',
            ]);
            $user->password = bcrypt($request->password);
            //dd($user);
            $user->save();
            return redirect('user')->with('successMsg', 'Password Successfully Updated.');
        }
        //dd($request);
        $errors = "Old password does not matched.";
        return Redirect::back()->withErrors($errors);

        
    }

    public function accountsetting()
    {
        //

        return view('user.accountsetting');
    }

    // public function activities()
    // {
    //     //

    //     return view('user.activities');
    // }
    public function request()
    {
        //

        return view('user.request');
    }

    public function addquestion()
    {
        //

        return view('user.addquestion');
    }
    
     
    public function notification()
    {
        //

        return view('user.notification');
    }

    public function viewUser($id)
    {
        //

        $user = User::find($id);
        //dd($user);
        if ($user == Null){
            return view('404');
        }else {
            if ($user->role != 'User'){
               return view('404'); 
            }
            if ($user == Auth::user()) {
                $profilevisitor  = Profilevisitor::where('user_id',$id)->count();
                return view('user.profile',compact('profilevisitor'));
            }  

            $ip = \Request::ip();

            $profilevisitor = Profilevisitor::where([['user_id',$id],['ip',$ip]])->first();

            if ($profilevisitor == null) {
                $profilevisitor = new Profilevisitor();
                $profilevisitor->user_id = $id;
                $profilevisitor->ip = $ip;
                $profilevisitor->save();

                $visitor  = $user->profile_visitor;
                $visitor = $visitor + 1;
                $user->profile_visitor = $visitor;
                $user->save();

            }


            $profilevisitor  = Profilevisitor::where('user_id',$id)->count();

            return view('profile', compact('user','profilevisitor'));
        }
    }

}
