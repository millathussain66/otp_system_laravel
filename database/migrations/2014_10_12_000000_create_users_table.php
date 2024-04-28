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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->char('pin', 10)->nullable();
            $table->char('user_id', 20)->nullable();
            $table->char('firstname', 40)->nullable();
            $table->char('lastname', 40)->nullable();
            $table->integer('user_group_id')->nullable();
            $table->string('mobile_number', 150)->nullable();
            $table->string('email_address', 100)->nullable();
            $table->string('password', 4000)->nullable();
            $table->string('location', 50)->nullable();
            $table->string('remarks', 100)->nullable();
            $table->integer('admin_status')->default(0);
            $table->integer('password_change_status')->nullable();
            $table->dateTime('password_change_datetime')->nullable();
            $table->integer('verify_status')->nullable();
            $table->integer('lock_status')->default(0);
            $table->integer('block_status')->default(0);
            $table->string('user_address', 255)->nullable();
            $table->dateTime('password_expiry_date')->nullable();
            $table->integer('data_status')->default(1);
            $table->integer('entry_by')->nullable();
            $table->dateTime('entry_datetime')->nullable();
            $table->integer('verify_by')->nullable();
            $table->dateTime('verify_datetime')->nullable();
            $table->integer('last_modified_by')->nullable();
            $table->dateTime('last_modified_datetime')->nullable();
            $table->integer('delete_by')->nullable();
            $table->dateTime('delete_datetime')->nullable();
            $table->integer('block_by')->nullable();
            $table->dateTime('block_datetime')->nullable();
            $table->integer('unblock_by')->nullable();
            $table->dateTime('unblock_datetime')->nullable();
            $table->double('SESSION_idle_time', 8, 2)->default(58);
            $table->double('global_session_time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
