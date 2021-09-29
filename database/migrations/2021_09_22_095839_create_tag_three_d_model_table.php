<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagThreeDModelTable extends Migration
{
    public function up()
    {
        Schema::create('tag_three_d_model', function (Blueprint $table) {
            $table->foreignId('tag_id')->constrained()->onDelete('cascade');
            $table->foreignId('three_d_model_id')->constrained()->onDelete('cascade');
            $table->unique(['tag_id', 'three_d_model_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('tag_three_d_model');
    }
}
