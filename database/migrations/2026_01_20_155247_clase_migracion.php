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
        Schema::create('films', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->integer('year');
            $table->string('genre', 100);
            $table->string('img_url', 500);
            $table->integer('duration');
            $table->string('country', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('films', function (Blueprint $table) {
            Schema::drop('films');
        });
    }
};
