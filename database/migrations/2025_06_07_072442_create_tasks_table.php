<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id(); // ID da tarefa
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Dono da tarefa

            $table->string('title'); // Título
            $table->text('description')->nullable(); // Descrição opcional
            $table->date('due_date'); // Data de vencimento

            $table->enum('status', ['pendente', 'em andamento', 'concluida'])->default('pendente'); // Status com default

            $table->timestamps(); // created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
