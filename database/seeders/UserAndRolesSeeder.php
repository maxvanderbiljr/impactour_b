<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserAndRolesSeeder extends Seeder
{
    public function run(): void
    {
        // ----------------------
        // 1️⃣ Limpa cache de permissões
        // ----------------------
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // ----------------------
        // 2️⃣ Criar papéis
        // ----------------------
        $roles = ['admin', 'comunidade', 'aluno', 'viajante'];
        foreach ($roles as $roleName) {
            Role::firstOrCreate(['name' => $roleName]);
        }

        // ----------------------
        // 3️⃣ Criar permissões
        // ----------------------
        $permissions = [
            // Usuários
            'view users', 'edit users', 'delete users',

            // Experiências
            'view experiencias', 'create experiencias', 'edit experiencias', 'delete experiencias',

            // Comunidades
            'view comunidades', 'create comunidades', 'edit comunidades', 'delete comunidades',

            // Como Funciona
            'view como funciona', 'edit como funciona',

            // Slides
            'view slides', 'edit slides',

            // Impactos
            'view impactos', 'create impactos', 'edit impactos', 'delete impactos',

            // Menus
            'view menus', 'edit menus',

            // Postagens/Anúncios
            'create anuncios', 'edit anuncios', 'delete anuncios', 'moderate anuncios',

            // Perfil
            'view perfil', 'edit perfil',

            // Interações
            'curtir', 'comentar', 'contratar', 'avaliar experiencias',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // ----------------------
        // 4️⃣ Atribuir permissões aos papéis
        // ----------------------
        Role::firstWhere('name', 'admin')->syncPermissions($permissions);

        Role::firstWhere('name', 'aluno')->syncPermissions([
            'view experiencias', 'create experiencias', 'edit experiencias',
            'view perfil', 'edit perfil',
            'create anuncios', 'edit anuncios',
            'curtir', 'comentar', 'contratar', 'avaliar experiencias',
        ]);

        Role::firstWhere('name', 'comunidade')->syncPermissions([
            'view comunidades', 'create comunidades', 'edit comunidades', 'delete comunidades',
            'view experiencias',
            'create anuncios', 'edit anuncios', 'delete anuncios',
            'curtir', 'comentar', 'contratar', 'avaliar experiencias',
        ]);

        Role::firstWhere('name', 'viajante')->syncPermissions([
            'view comunidades', 'view experiencias',
            'create anuncios', 'edit anuncios',
            'curtir', 'comentar', 'contratar', 'avaliar experiencias',
        ]);

        // ----------------------
        // 5️⃣ Criar usuários padrão
        // ----------------------
        $users = [
            [
                'name' => 'Admin Principal',
                'email' => 'admin@email.com',
                'password' => Hash::make('12345678'),
                'role' => 'admin',
            ],
            [
                'name' => 'Aluno Teste',
                'email' => 'aluno@email.com',
                'password' => Hash::make('12345678'),
                'role' => 'aluno',
            ],
            [
                'name' => 'Comunidade Teste',
                'email' => 'comunidade@email.com',
                'password' => Hash::make('12345678'),
                'role' => 'comunidade',
            ],
            [
                'name' => 'Viajante Teste',
                'email' => 'viajante@email.com',
                'password' => Hash::make('12345678'),
                'role' => 'viajante',
            ],
        ];

        foreach ($users as $u) {
            $user = User::firstOrCreate(
                ['email' => $u['email']],
                ['name' => $u['name'], 'password' => $u['password']]
            );

            if (!$user->hasRole($u['role'])) {
                $user->assignRole($u['role']);
            }
        }

        $this->command->info('Usuários, papéis e permissões criados com sucesso!');
    }
};