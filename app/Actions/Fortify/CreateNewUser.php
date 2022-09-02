<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

use Image;

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
            'phone' => ['required'],
            'dept'   => ['required', 'string', 'max:255'],
            'recognition' => ['required'],
            'signature' => ['mimes:jpeg,jpg'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        $user = new User();
        $user->name         = $input['name'];
        $user->email        = $input['email'];
        $user->phone        = $input['phone'];
        $user->password     = Hash::make($input['password']);
        $user->role         = 'Teacher';
        $user->dept         = $input['dept'];
        $user->recognition  = $input['recognition'];
        $user->is_official  = $input['is_official'];

        if (isset($input['signature'])) {
            $image_tmp = $input['signature'];
            if ($image_tmp->isValid()) {
                $image_name = $image_tmp->getClientOriginalName();
                $extension = $image_tmp->getClientOriginalExtension();
                $image_new_name = $image_name.'-'.rand(111,99999).'.'.$extension;

                $original_image_path = 'assets/uploads/signatures/'.$image_new_name;
                
                Image::make($image_tmp)->save($original_image_path);
                
                $user->signature = $image_new_name;
            }
        }

        $user->save();

        $user->assignRole('Teacher');

        return $user;
    }
}
