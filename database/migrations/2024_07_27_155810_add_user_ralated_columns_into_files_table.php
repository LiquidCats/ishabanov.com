<?php

use App\Data\Database\Eloquent\Models\FileModel;
use App\Data\Database\Eloquent\Models\UserModel;
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
        Schema::table((new FileModel())->getTable(), function (Blueprint $table) {
            $table->unsignedBigInteger('created_by')->nullable()->index();

            $table->foreign('created_by')
                ->references('id')
                ->on((new UserModel())->getTable())
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table((new FileModel())->getTable(), function (Blueprint $table) {
            $table->dropForeign('created_by');
            $table->dropColumn('created_by');
        });
    }
};
