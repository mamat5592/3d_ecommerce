<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkillUserTable extends Migration
{
    public function up()
    {
        Schema::create('skill_user', function (Blueprint $table) {
            $table->foreignId('skill_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->unique(['skill_id', 'user_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('skill_user');
    }
}
