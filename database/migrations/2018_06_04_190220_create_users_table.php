<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    public function up() {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('social_security_number');
            $table->string('email');
            $table->string('password');
            $table->string('phone_number');
            $table->string('remember_token', 100)->nullable();
            $table->integer('user_type_id')->unsigned();
            $table->boolean('activated')->default(true);
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('users');
    }
}

