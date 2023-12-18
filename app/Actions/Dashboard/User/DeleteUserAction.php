<?php

namespace App\Actions\Dashboard\User;

use App\Models\user;

class DeleteUserAction
{
    public function execute($slug)
    {
        $user = User::where('slug', $slug)->firstOrFail();
        $user->delete();
    }

}
