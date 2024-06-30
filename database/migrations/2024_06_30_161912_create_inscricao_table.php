<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {//database/mig
        Schema::disableForeignKeyConstraints();ration
        Schema::create('inscricaos', function (Blueprint $table) {
            $table->id();
            $table->string('nome',100);
            $table->string("insta",14);
            $table->string("telefone",20);
            $table->foreignId ('categoria_inscricao_id')->nullable()
                ->constrained('categoria_inscricaos')->after('id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscricao');
    }
};