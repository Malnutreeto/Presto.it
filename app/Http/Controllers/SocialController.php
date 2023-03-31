<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function redirect($provider){
       return Socialite::driver($provider)->redirect();
    }
 
    public function callback($provider){
      
      $providerUser = Socialite::driver($provider)->stateless()->user();

      $user = User::where([
             'provider' => $provider,
             'provider_id' => $providerUser->id,
         ])->orWhere('email', $providerUser->email )->first();

      
 
       if (!$user){
             $user = User::create(
             [
                'name' => $providerUser->name,
                'email' => $providerUser->email,
                'surname' => $provider === 'google' ? $providerUser->user['given_name'] : $providerUser->name,
                'nickname' => $provider === 'google' ? $providerUser->user['family_name'] : $providerUser->email,
                'password' => Hash::make(Str::random(10)),
                'role_id' => 4,
                'provider' => $provider,
                'provider_id' => $providerUser->id,
                'provider_token' => $providerUser->token,
             ]);
       }
 
       Auth::login($user);
 
       return redirect()->route('product.create');
 
   }
}
