<?php

namespace App\Policies;

use App\Models\User;

class ImpactPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('view impactos');
    }
}