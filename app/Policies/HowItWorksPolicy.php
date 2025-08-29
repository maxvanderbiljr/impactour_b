<?php

namespace App\Policies;

use App\Models\User;

class HowItWorksPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('view como funciona');
    }
}