<?php

namespace App\Policies;

use App\Models\User;

class NavigationPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('view menus');
    }
}