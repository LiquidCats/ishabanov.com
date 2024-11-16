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
        Schema::dropIfExists('user_emails');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('user_emails', static function (Blueprint $table) {
            $table->id();
            $table->string('email', 100);
            $table->string('name', 100);
            $table->integer('subject')->default(0);
            $table->timestamps();
        });
    }
};
