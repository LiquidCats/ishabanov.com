<?php

use App\Data\Database\Eloquent\Models\PostModel;
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
        Schema::table((new PostModel)->getTable(), static function (Blueprint $table) {
            $table->jsonb('blocks')
                ->after('content')
                ->default('[]');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table((new PostModel)->getTable(), static function (Blueprint $table) {
            $table->dropColumn('blocks');
        });
    }
};
