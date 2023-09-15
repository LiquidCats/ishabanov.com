<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('experiences', static function (Blueprint $table) {
            $table->id();
            $table->string('company_name', 100);
            $table->string('company_url', 100);
            $table->string('company_logo', 200);
            $table->string('position', 200);
            $table->string('description', 500);
            $table->timestamp('started_at')
                ->comment('date when enter');
            $table->timestamp('ended_at')
                ->nullable()
                ->comment('date when leave company');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experiences');
    }
};
