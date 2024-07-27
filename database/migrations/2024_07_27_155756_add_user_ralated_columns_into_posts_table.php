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
        Schema::table((new PostModel())->getTable(), function (Blueprint $table) {
            $table->renameColumn('author_id', 'created_by');
            $table->unsignedBigInteger('updated_by')->nullable()->index();

            $table->index('created_by');
            $table->index('preview_image_id');

            $table->foreign('created_by')
                ->references('id')
                ->on((new UserModel())->getTable())
                ->onDelete('set null');
            $table->foreign('updated_by')
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
        Schema::table((new PostModel())->getTable(), function (Blueprint $table) {
            $table->dropIndex('created_by');
            $table->dropIndex('updated_by');
            $table->dropIndex('preview_image_id');

            $table->dropForeign('created_by');
            $table->dropForeign('updated_by');

            $table->renameColumn('created_by', 'author_id');

            $table->foreign('author_id')
                ->references('id')
                ->on((new UserModel())->getTable())
                ->onDelete('set null');
        });
    }
};
