<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'size:11'],
            'dept'   => ['required', 'string', 'max:255'],
            'session' => ['required'],
            'student_id' => ['required', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        $user = new User();
        $user->name           = $input['name'];
        $user->email          = $input['email'];
        $user->phone          = $input['phone'];
        $user->password       = Hash::make($input['password']);
        $user->role           = 'Student';
        $user->department     = $input['dept'];
        $user->session        = $input['session'];
        $user->student_id     = $input['student_id'];
        $user->username       = $input['student_id'].$input['hall_id'];
        $user->is_residential = 'No';

        
        $user->save();

        $user->assignRole('Student');

        return $user;

    }
}
