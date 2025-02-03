<?php

declare(strict_types=1);

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
        Schema::create('experience_tool', static function (Blueprint $table) {
            $table->integer('experience_id')->index();
            $table->string('tool_id', 50)->index();
            $table->tinyInteger('level_id')
                ->default(0);

            $table->foreign('experience_id')
                ->references('id')
                ->on('experiences')
                ->cascadeOnDelete();

            $table->foreign('tool_id')
                ->references('id')
                ->on('tools')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experience_tool');
    }
};
