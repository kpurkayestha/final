<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Validator;
use App\User;
use App\Question;
use DB;
use Auth;
use App\Comment;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function __construct()
    {
        
    }

    public function index()
    {
        return view('admin.dashboard');
    }
    public function profile()
    {
        return view('admin.profile');
    }

    public function editprofile()
    {
        return view('admin.editprofile');
    }

    public function updateProfile(Request $request)
    {
        
        //dd($request);
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'image' => 'required|image',            // |mimes: jpeg, jpg
            'about' => 'required|string|max:400',
            'location' => 'required|string|max:255',
        ]);
        
        $user = User::find(Auth::user()->id);
        
        $image = $request->file('image');
        $slug = str_slug($request->name);
        if (isset ($image)) {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if (!file_exists('uploads/admin/images')) {
                mkdir('uploads/admin/images', 0777, true);
            }
            
            if ($user->pro_pic != 'default.jpg'){
                unlink('uploads/admin/images/'.$user->pro_pic); //delete file from the server
            }
            $image->move('uploads/admin/images', $imagename);
        }
        else {
            $imagename = 'default.jpg';
        }
        
        $user->name = $request->name;
        $user->pro_pic = $imagename;
        $user->about = $request->about;
        $user->location = $request->location;
        //dd($request);
        $user->save();
        return redirect(route('admin.profile'))->with('successMsg', 'Profile Successfully Updated.');

    }

    public function account()
    {
        return view('admin.accountsetting');
    }

    public function password(Request $request)
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
            return redirect(route('admin.profile'))->with('successMsg', 'Password Successfully Updated.');
        }
        //dd($request);
        $errors = "Old password does not matched.";
        return Redirect::back()->withErrors($errors);
        //return view('admin.accountsetting', compact('errors'));
    }



    //alladmin
   
   	public function alladmin()
    {
        $users = DB::table('users')
                    ->where('role', '!=', 'user')
                    ->get();
        
        return view('admin.alladmin', compact('users'))->with('no', 1);
        
    }
    public function addadmin()
    {
        return view('admin.addadmin');
    }

    public function add(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'email|required|unique:users',
            'role' => 'required',
            'password' => 'string|required|min:6',
        ]);
        
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = bcrypt($request->password);
        
        $user->save();

        return redirect(route('admin.alladmin'))->with('successMsg', 'Admin successfully added.');
    }


    public function viewadmin($id)
    {
        $admin = User::find($id);
        
        return view('admin.viewadmin', compact('admin'));
        
    }
    public function editadmin($id)
    {
        $admin = User::find($id);
        
        return view('admin.editadmin', compact('admin'));
        
    }

    public function updateadmin(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required',
            'role' => 'required',
        ]);

        $admin = User::find($id);
        
        $admin->name = $request->name;
        $admin->role = $request->role;
        
        $admin->save();
        
        
        return redirect(route('admin.alladmin'))->with('successMsg', 'Admin successfully updated.');
        
    }

    public function deleteAdmin($id)
    {
        //dd($id);
        User::find($id)->delete();
        return redirect()->back()->with('successMsg', 'Admin Successfully Deleted');
    }



	//alluser    

    public function alluser()
    {
        //$users = User::where('role', 'user');               //->sortbyDesc('id');

        $users = DB::table('users')
                    ->where('role', '=', 'user')
                    ->get();

        return view('admin.alluser', compact('users'))->with('no', 1);
    }

    public function banuser($id)
    {
        $user = User::find($id);
        $user->ban = 1;
        $user->save();

        return redirect('/admin/user')->with('banMsg', 'User Ban Successfully');;
    }

    public function unbanuser($id)
    {
        $user = User::find($id);
        $user->ban = 0;
        $user->save();

        return redirect('/admin/user')->with('banMsg', 'User Unban Successfully');
    }


    public function viewuser($id)
    {
        $user = User::find($id);

        return view('admin.viewuser', compact('user'));
    }


    public function deleteUser($id)
    {
        //dd($id);
        User::find($id)->delete();
        return redirect()->back()->with('successMsg', 'User Successfully Deleted');
    }





    //allquestion

     public function allquestion()
    {
        $questions = Question::all();


        return view('admin.allquestion', compact('questions'))->with('no',1);
    }

    public function viewquestion($id)
    {
        $question = Question::find($id);

        return view('admin.viewquestion', compact('question'));
    }
   











    //allcomment

     public function allcomment()
    {
        $comments = Comment::all();
        $no = 1;
        return view('admin.allcomment',compact('comments','no'));
    }
     public function viewcomment()
    {
        return view('admin.viewcomment');
    }

//all message

     public function allmessage()
    {
        return view('admin.message');
    }
     public function viewmessage()
    {
        return view('admin.viewmessage');
    }
     public function replymessage()
    {
        return view('admin.replymessage');
    }

//add category
    public function addcategory()
    {
        return view('admin.addcategory');
    }
    public function allcategory()
    {
        return view('admin.allcategory');
    }
    //admin login register

    public function login()
    {
        return view('admin.login');
    }

    public function register()
    {
        return view('admin.register');
    }
}
