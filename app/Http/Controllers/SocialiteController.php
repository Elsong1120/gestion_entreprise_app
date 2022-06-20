<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\SocialAcount;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{

    //Array of authorized providers
    protected $providers = ["google"];

    public function loginRegister()
    {
        return view("socialite.login-register");
    }


    //redirection to the provider
    public function redirect(Request $rq)
    {
        $provider = $rq->provider;

        if (in_array($provider, $this->providers)) {
            return Socialite::driver($provider)->redirect();
        }
        abort(404);
    }


    public function callback(Request $rq)
    {
        // $faker = Faker::create();
        try {

            $provider = $rq->provider;

            if (in_array($provider, $this->providers)) {
                //get the data from the provider
                $social_user = Socialite::driver($rq->provider)->user();

                //Find the social account
                $account = SocialAcount::where([
                    'provider_name' => $provider,
                    'provider_id' => $social_user->getId()
                ])->first();


                //If Social Account Exist then Find User and Login
                if ($account) {
                    auth()->login($account->user);
                    return redirect()->route('home');
                }

                // Find User
                $user = User::where([
                    'email' => $social_user->getEmail()
                ])->first();

                if (!$user) {
                    $user = new User;
                    $user->name = $social_user->getName();
                    $user->email = $social_user->getEmail();
                    $user->password = Hash::make('oklm');
                    $user->isprofilcompleted = false;
                    $user->save();

                    // Create Social Accounts
                    $user->socialAccounts()->create([
                        'provider_id' => $social_user->getId(),
                        'provider_name' => $provider,
                        'user_id' => $user->id
                    ]);

                    // Login
                    auth()->login($user);
                    return redirect()->route('home');
                }
            }
        } catch (\Exception $e) {
            return redirect()->route('login');
        }
    }
}
