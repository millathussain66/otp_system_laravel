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
        Schema::create('menu_link', function (Blueprint $table) {
            $table->id();
            $table->integer('menu_group_id')->nullable();
            $table->integer('menu_cate_id')->nullable();
            $table->integer('menu_sub_cate_id')->nullable();
            $table->string('menu_operation', 50)->nullable();
            $table->string('menu_link_name', 200)->nullable();
            $table->string('url_prefix', 100)->nullable();
            $table->integer('sort_order')->nullable();
            $table->integer('entry_by')->nullable();
            $table->dateTime('entry_datetime')->nullable();
            $table->integer('update_by')->nullable();
            $table->dateTime('update_datetime')->nullable();
            $table->integer('delete_by')->nullable();
            $table->dateTime('delete_datetime')->nullable();
            $table->integer('data_status')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_link');
    }
};
