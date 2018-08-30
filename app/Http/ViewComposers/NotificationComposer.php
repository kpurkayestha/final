<?php

namespace App\Http\ViewComposers;

use App\Notification;
use App\Repositories\UserRepository;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class NotificationComposer
{
	public function compose(view $view)
	{	  
		
		if (Auth::user()) {
			
			
			$notifications = Notification::where('notification_user_id',Auth::id())->orderby('created_at','desc')->get();
			$unreadnotification = Notification::where([['notification_user_id',Auth::id()],['status','0']])->count();

			$view->with('notifications',$notifications)->with('unreadnotification',$unreadnotification);
		}
		
	}
}