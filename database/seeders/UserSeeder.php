<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // ---------------------------
        // Usuário Admin
        // ---------------------------
        User::updateOrCreate(
            ['email' => 'admin@email.com'],
            [
                'name_profile' => 'Max Vanderbil',
                'name' => 'admin',
                'email' => 'admin@email.com',
                'password' => Hash::make('12345678'), // Senha padrão
                'endereco' => 'Endereço do Admin',
                'telefone' => '(68) 99999-9999',
            ]
        );

        // ---------------------------
        // Usuário Aluno
        // ---------------------------
        User::updateOrCreate(
            ['email' => 'aluno@email.com'],
            [
                'name_profile' => 'Aluno Teste',
                'name' => 'aluno',
                'email' => 'aluno@email.com',
                'password' => Hash::make('12345678'),
                'endereco' => 'Endereço do Aluno',
                'telefone' => '(68) 98888-8888',
            ]
        );

        // ---------------------------
        // Usuário Comunidade
        // ---------------------------
        User::updateOrCreate(
            ['email' => 'comunidade@email.com'],
            [
                'name_profile' => 'Comunidade Teste',
                'name' => 'comunidade',
                'email' => 'comunidade@email.com',
                'password' => Hash::make('12345678'),
                'endereco' => 'Endereço da Comunidade',
                'telefone' => '(68) 97777-7777',
            ]
        );

        // ---------------------------
        // Usuário Viajante
        // ---------------------------
        User::updateOrCreate(
            ['email' => 'viajante@email.com'],
            [
                'name_profile' => 'Viajante Teste',
                'name' => 'viajante',
                'email' => 'viajante@email.com',
                'password' => Hash::make('12345678'),
                'endereco' => 'Endereço do Viajante',
                'telefone' => '(68) 96666-6666',
            ]
        );

        $this->command->info('Seeder de usuários completada com sucesso!');
    }
}
