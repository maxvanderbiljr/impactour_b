<?php

namespace App\Policies;

use App\Models\User;

class HeroPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('view slides');
    }
}