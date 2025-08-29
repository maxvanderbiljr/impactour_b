<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Experience;

class ExperiencePolicy
{
    public function viewAny(User $user): bool
{
    return $user->can('view experiencias');
}

public function create(User $user): bool
{
    return $user->can('create experiencias');
}

public function update(User $user, Experience $experience): bool
{
    // Admin pode editar tudo, outros só se forem donos do registro
    return $user->can('edit experiencias') && ($user->hasRole('admin') || $experience->user_id === $user->id);
}

public function delete(User $user, Experience $experience): bool
{
    // Admin pode excluir tudo, outros só se forem donos do registro
    return $user->can('delete experiencias') && ($user->hasRole('admin') || $experience->user_id === $user->id);
}

}