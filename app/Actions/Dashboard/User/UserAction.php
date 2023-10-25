<?php
namespace App\Actions\Dashboard\User;



class UserAction {
    public function execute(UserData $userData)
    {
        $user = User::updateOrCreate(
            ['slug' => $userData->slug],
            [
                'name' => $userData->name,
                
            ],
        );
    }

}
