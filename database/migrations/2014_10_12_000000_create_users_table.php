<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('name');
            $table->string('avatar')->nullable();
            $table->string('email')->unique();
            $table->integer('phone')->unique();
            $table->string('address');
            $table->string('country');
            $table->string('province');
            $table->string('city');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password'); // hashed in setPasswordAttribute function on user model
            $table->foreignId('role_id')->constrained()->cascadeOnDelete();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
