<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('experiences', function (Blueprint $table) {
            // quem cadastrou a experiência (admin ou aluno, por exemplo)
            $table->foreignId('user_id')->nullable()->constrained()->cascadeOnDelete();

            // qual comunidade está vinculada
            $table->foreignId('community_id')->nullable()->constrained('communities')->cascadeOnDelete();

            // se quiser separar viajante de "usuário comum"
            $table->foreignId('traveler_id')->nullable()->constrained('users')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('experiences', function (Blueprint $table) {
            $table->dropConstrainedForeignId('user_id');
            $table->dropConstrainedForeignId('community_id');
            $table->dropConstrainedForeignId('traveler_id');
        });
    }
};
