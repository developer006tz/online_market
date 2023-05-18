<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('post_post_category', function (Blueprint $table) {
            $table
                ->foreign('post_category_id')
                ->references('id')
                ->on('post_categories')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('post_id')
                ->references('id')
                ->on('posts')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('post_post_category', function (Blueprint $table) {
            $table->dropForeign(['post_category_id']);
            $table->dropForeign(['post_id']);
        });
    }
};
