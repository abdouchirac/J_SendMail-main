<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
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
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->foreignId('poste_id')->constrained('postes');
            $table->foreignId('image_id')->nullable()->constrained('images')->default();
            $table->string('password');
            $table->enum('user_type', ['admin', 'user'])->default('user');
            $table->timestamp('email_verified_at')->nullable();
            $table->foreignId('role_id')->default()->constrained('roles');
            $table->enum('status', ['actif', 'inactif']);
            $table->rememberToken()->unique();
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
}
