<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Papéis
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $comunidade = Role::firstOrCreate(['name' => 'comunidade']);
        $aluno = Role::firstOrCreate(['name' => 'aluno']);
        $viajante = Role::firstOrCreate(['name' => 'viajante']);

        // Permissões
        $permissions = [
            // Usuários
            'view users',
            'edit users',
            'delete users',

            // Experiências
            'view experiencias',
            'create experiencias',
            'edit experiencias',
            'delete experiencias',

            // Comunidades
            'view comunidades',
            'create comunidades',
            'edit comunidades',
            'delete comunidades',

            // Como Funciona
            'view como funciona',
            'edit como funciona',

            // Slides
            'view slides',
            'edit slides',

            // Impactos
            'view impactos',
            'create impactos',
            'edit impactos',
            'delete impactos',

            // Menus
            'view menus',
            'edit menus',

            // Postagens/Anúncios
            'create anuncios',
            'edit anuncios',
            'delete anuncios',
            'moderate anuncios',

            // Perfil
            'view perfil',
            'edit perfil',

            // Interações
            'curtir',
            'comentar',
            'contratar',
            'avaliar experiencias',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Admin recebe todas as permissões
        $admin->givePermissionTo($permissions);

        // Aluno
        $aluno->givePermissionTo([
            'view experiencias',
            'create experiencias',
            'edit experiencias',
            'view perfil',
            'edit perfil',
            'create anuncios',
            'edit anuncios',
            'curtir',
            'comentar',
            'contratar',
            'avaliar experiencias',
        ]);

        // Comunidade
        $comunidade->givePermissionTo([
            'view comunidades',
            'create comunidades',
            'edit comunidades',
            'delete comunidades',
            'view experiencias',
            'create anuncios',
            'edit anuncios',
            'delete anuncios',
            'curtir',
            'comentar',
            'contratar',
            'avaliar experiencias',
        ]);

        // Viajante
        $viajante->givePermissionTo([
            'view comunidades',
            'view experiencias',
            'create anuncios',
            'edit anuncios',
            'curtir',
            'comentar',
            'contratar',
            'avaliar experiencias',
        ]);

        // Atribui papel admin ao usuário principal
        $user = \App\Models\User::where('email', 'admin@email.com')->first();
        if ($user) {
            $user->assignRole('admin');
        }
    }
}