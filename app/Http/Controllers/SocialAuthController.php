<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Auth;

class SocialAuthController extends Controller
{
    //

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

     public function handleProviderCallback($provider)
    {

        if ($provider =='twitter') {
            $user = Socialite::driver($provider)->user();

            $authUser=User::firstOrNew(['provider_id'=> $user->id]);

            $authUser->name=$user->name;
            $authUser->email=$user->email;
            $authUser->provider=$provider;
            $authUser->provider_id=$user->id;
            
            //$authUser->pro_pic=$user->avatar_original;
            //dd($authUser);
            
             $authUser->save();

            Auth::login($authUser);
 
        }
        else
        {
           $user = Socialite::driver($provider)->stateless()->user();

           $authUser=User::firstOrNew(['provider_id'=> $user->id]);

            $authUser->name=$user->name;
            $authUser->email=$user->email;
            $authUser->provider=$provider;
            $authUser->provider_id=$user->id;
            
             //$authUser->pro_pic=$user->avatar_original;
             //dd($authUser);
            
            $authUser->save();


            Auth::login($authUser);

        }

        // //dd($user);

        return redirect()->route('blog');
        

    }
}
