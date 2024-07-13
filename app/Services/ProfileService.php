<?php

namespace App\Services;

use App\Models\User;

class ProfileService
{
    public function update(User $user, array $data)
    {
        $user->name = $data['name'];
        $user->number = $data['number'];

        if ($password = $data['password'] ?? null) {
            $user->password = bcrypt($password);
        }

        $user->save();
    }
}
