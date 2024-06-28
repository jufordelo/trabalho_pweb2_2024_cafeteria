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
   {//database/migration
    Schema::create('personalizado', function (Blueprint $table) {
        $table->id();
        $table->string('nome',100);
        $table->string("peso",14);
        $table->string("contato",40);
        $table->foreignId ('categoria_personalizado_id')->nullable()
        ->constrained('categoria_personalizado')->after('id');
        $table->timestamps();
    });  Schema::enableForeignKeyConstraints();
}

/**
 * Reverse the migrations.
 */
public function down(): void
{
    Schema::dropIfExists('personalizado');
}
};

