<?php

use App\Data\Database\Eloquent\Models\PostModel;
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
        Schema::table((new PostModel)->getTable(), function (Blueprint $table) {
            $table->dropColumn('author_id');

            $table->unsignedBigInteger('created_by')->nullable()->index();
            $table->unsignedBigInteger('updated_by')->nullable()->index();

            $table->index('preview_image_id');

            $table->foreign('created_by')
                ->references('id')
                ->on((new UserModel)->getTable())
                ->onDelete('set null');
            $table->foreign('updated_by')
                ->references('id')
                ->on((new UserModel)->getTable())
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table((new PostModel)->getTable(), function (Blueprint $table) {
        //     $table->dropColumn('created_by');
        // });
        // Schema::table((new PostModel)->getTable(), function (Blueprint $table) {
        //     $table->dropColumn('updated_by');
        // });
        Schema::table((new PostModel)->getTable(), function (Blueprint $table) {
            $table->unsignedBigInteger('author_id')->index()->nullable();

            $table->foreign('author_id')
                ->references('id')
                ->on((new UserModel)->getTable())
                ->onDelete('set null');
        });
    }
};
