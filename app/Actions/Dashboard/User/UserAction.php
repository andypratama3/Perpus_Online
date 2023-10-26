<?php
namespace App\Actions\Dashboard\User;

use App\DataTransferObjects\UserSettingsData;

class UserAction {
    public function execute(UserSettingsData $userData)
    {
        $user = User::updateOrCreate(
            ['slug' => $userData->slug],
            [
                'name' => $userData->name,
                'email' => $userData->email,
            ],
        );
        if(empty($userData->slug)) {
            $user->roles()->attach($userData->role);
        } else {
            $user->roles()->sync($userData->role);
        }
    }

}
