<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Socialite;

class AuthController extends Controller
{
    protected $redirectTo = '/home';
    // Some methods which were generated with the app
    /**
     **_ Redirect the user to the OAuth Provider.
    _**
     **_ @return Response
    _**/
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
    _ Obtain the user information from provider.  Check if the user already exists in our
    _ database by looking up their provider_id in the database.
    _ If the user exists, log them in. Otherwise, create a new user then log them in. After that
    _ redirect them to the authenticated users homepage.
    _
    _ @return Response
    _/
     */
    public function handleProviderCallback($provider)
    {
        $authUser = $this->findOrCreateUser(Socialite::driver($provider)->stateless()->user(), $provider);
        Auth::login($authUser, true);
        return redirect($this->redirectTo);
    }

   /*
    _ If a user has registered before using social auth, return the user
    _ else, create a new user object.
    _ @param  $user Socialite user object
    _ @param $provider Social auth provider
    _ @return  User
     */
    public function findOrCreateUser($user, $provider)
    {
//        dd($user);
        $authUser = User::where('provider_id', $user->id)->first();
        if ($authUser) {
            return $authUser;
        }
        return User::create([
            'name'     => $user->name,
            'email'    => $user->email,
            'provider' => $provider,
            'provider_id' => $user->id,
            'image'  => $user->avatar
        ]);
    }
}
