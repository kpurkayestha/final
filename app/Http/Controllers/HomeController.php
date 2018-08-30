<?php

namespace App\Http\Controllers;

use App\Notification;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function notificationview($id)
    {
        $notification = Notification::find($id);
        $notification->status = '1';
        $notification->save();

        return redirect('question/view/'.$notification->question_id);
    }
}
