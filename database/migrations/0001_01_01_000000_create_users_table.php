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
            $table->bigInteger('id')->primary()->unsigned()->autoIncrement();
            $table->string('prefixname', 255)->default(null)->nullable();
            $table->string('firstname', 255)->default(null);
            $table->string('middlename', 255)->default(null)->nullable();
            $table->string('lastname', 255)->default(null);
            $table->string('suffixname', 255)->default(null)->nullable();
            $table->string('username', 255)->default(null)->unique();
            $table->string('email', 255)->default(null)->unique();
            $table->text('password')->default(null);
            $table->text('photo')->default(null)->nullable();
            $table->string('type')->default('user')->index();
            $table->string('remember_token', 100)->default(null)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
