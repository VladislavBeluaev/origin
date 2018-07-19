<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\User;
use Auth;
class AuthController extends Controller
{
	public function __construct()
	{
		$this->middleware('guest')->except('logout');
	}
    public function  redirectToProvider()
    {
    	return Socialite::driver('github')->redirect();
    }

    public function  handleProviderCallback()
    {
    	//$gitHubUser = Socialite::driver('github')->user();
    	//dd(Socialite::driver('github')->user());
    	$user = $this->findOrCreateGitHubUser(
    		Socialite::driver('github')->user()
    	);
    	Auth::login($user);
    	return redirect()->route('home');
    }

    public function loginDefault()
    {
    	Auth::LoginUsingId(5);
    	return redirect()->route('home');
    }

    public function  logout()
    {
    	Auth::logout();
    	return redirect()->route('home');
    }

    protected function findOrCreateGitHubUser($gitHubUser)
    {
    	$user = User::firstOrNew(['provider_id'=>$gitHubUser->id]);
    	//dd($user->exists);
    	if($user->exists) return $user;
    	$user->fill([

    		"provider_id"=>$gitHubUser->id,
    		"nickname"=>$gitHubUser->nickname,
    		"username"=>$gitHubUser->name,
    		"email"=>$gitHubUser->email,
    		"avatar"=>$gitHubUser->avatar,

    	])->save();
    	return $user;
    }
}
