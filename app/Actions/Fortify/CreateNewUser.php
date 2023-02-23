<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Str;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Services\Shared\AddressService;
use App\Services\Shared\SocialService;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
            'street' => 'required:city|string|max:255',
            'town' => 'required|string|max:255',
            'city' => 'required:street|string|max:255',
            'country' => 'required|string|max:255',
            'account' => 'required|string|max:255',
            'handle' => 'required|string|max:255',
        ])->validate();

        $location = array(
            'street' => $input['street'],
            'town' => $input['town'],
            'city' => $input['city'],
            'country' => $input['country'],

        );

        $social = array(
            'title' => $input['account'],
            'value' => $input['handle']
        );

        return

            DB::transaction(function () use ($input, $location, $social) {
                $user_id = DB::table('users')->insertGetId(
                    [
                        'uuid' => Str::uuid()->toString(),
                        'name' => $input['name'],
                        'username' => $input['username'],
                        'password' => Hash::make($input['password']),
                    ]
                );

                DB::table('socials')->insert([
                    'title' => $input['account'],
                    'value' => $input['handle'],
                    'user_id'=> $user_id
                ]);
                $user = User::find($user_id);
                AddressService::addForModel($user, $location);
                return $user;
            });
    }
}
