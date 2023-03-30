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
        Schema::create('sub_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('main_category_sub_category', 'sub_category_id')) {
            Schema::table('main_category_sub_category', function (Blueprint $table) {
                $table->dropForeign(['sub_category_id']);
                $table->dropColumn('sub_category_id');
           });
        }

        Schema::dropIfExists('sub_categories');
    }
};
