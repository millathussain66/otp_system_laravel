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
        Schema::create('menu_category', function (Blueprint $table) {
            $table->id();
            $table->integer('menu_group_id')->nullable();
            $table->string('menu_cate_name', 200)->nullable();
            $table->string('url_prefix', 100)->nullable();
            $table->integer('has_child')->nullable();
            $table->integer('sort_order')->nullable();
            $table->integer('entry_by')->nullable();
            $table->dateTime('entry_datetime')->nullable();
            $table->integer('update_by')->nullable();
            $table->dateTime('update_datetime')->nullable();
            $table->integer('delete_by')->nullable();
            $table->dateTime('delete_datetime')->nullable();
            $table->integer('data_status')->default(1);
            $table->tinyInteger('grid_nav_sts')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_category');
    }
};
