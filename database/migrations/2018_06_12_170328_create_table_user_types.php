<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUserTypes extends Migration
{
    public function up() {
        Schema::create('user_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
        });
    }

    public function down() {
        Schema::dropIfExists('user_types');
    }
}

