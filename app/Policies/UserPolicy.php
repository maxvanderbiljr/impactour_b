<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Permite visualizar usuários para quem tem permissão.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view users');
    }

    /**
     * Permite visualizar um usuário para quem tem permissão.
     */
    public function view(User $user, User $model): bool
    {
        return $user->can('view users');
    }

    /**
     * Permite criar usuários para quem tem permissão.
     */
    public function create(User $user): bool
    {
        return $user->can('edit users');
    }

    /**
     * Permite editar usuários para quem tem permissão.
     */
    public function update(User $user, User $model): bool
    {
        return $user->can('edit users');
    }

    /**
     * Permite excluir usuários para quem tem permissão.
     */
    public function delete(User $user, User $model): bool
    {
        return $user->can('delete users');
    }
}