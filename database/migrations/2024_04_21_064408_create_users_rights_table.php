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
        Schema::create('users_rights', function (Blueprint $table) {
            $table->id();
            $table->integer('user_info_id')->nullable();
            $table->integer('menu_link_id')->nullable();
            $table->integer('entry_by')->nullable();
            $table->dateTime('entry_datetime')->nullable();
            $table->integer('last_modify_by')->nullable();
            $table->dateTime('last_modify_datetime')->nullable();
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
        Schema::dropIfExists('users_rights');
    }
};
