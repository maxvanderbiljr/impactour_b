<?php

namespace App\Policies;

use App\Models\User;

class CommunityPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('view comunidades');
    }
}