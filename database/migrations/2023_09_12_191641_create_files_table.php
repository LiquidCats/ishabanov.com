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
        Schema::create('files', function (Blueprint $table) {
            $table->string('hash')->unique()->primary();
            $table->string('type', 255)
                ->comment('mime-type');
            $table->string('path', 1024)
                ->comment('full path to file in the FS');
            $table->string('extension', 10)
                ->comment('file extension');
            $table->string('name', 255)
                ->comment('visible file name');
            $table->unsignedBigInteger('file_size')
                ->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('files');
    }
};
