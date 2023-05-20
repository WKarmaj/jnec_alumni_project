<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\programme;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;
use Livewire\Component;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  array<string, string>  $input
     */
    public function update(User $user, array $input): void
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'year'=>['required'],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
            'address' =>['required'],
            'employment_status' =>['required'],
            'department_id' =>['required'],
            'programme_id' =>['required'],
            
        ])->validateWithBag('updateProfileInformation');

        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }
        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                'name' => $input['name'],
                'email' => $input['email'],
                'phone' => $input['phone'],
                'year' => $input['year'],
                'address' => $input['address'],
                'employment_status' => $input['employment_status'],
                'organization' => $input['organization'],
                'designation' => $input['designation'],
                'department_id' => $input['department_id'],
                'programme_id' => $input['programme_id'],
                
            ])->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  array<string, string>  $input
     */
    protected function updateVerifiedUser(User $user, array $input): void
    {
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'email_verified_at' => null,
            
        ])->save();

        $user->sendEmailVerificationNotification();
    }


}


