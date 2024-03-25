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
    {

        Schema::disableForeignKeyConstraints();

        Schema::table('sugestao', function (Blueprint $table){
            $table->foreignId ('cat_sugestao_id')->nullable()
            ->constrained('cat_sugestao')->after('id');
        });

      Schema::enableForeignKeyConstraints();

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sugestao', function (Blueprint $table) {
            //
        });
    }
};
