<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThreeDModelsTable extends Migration
{
    public function up()
    {
        Schema::create('three_d_models', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->text('description');
            $table->text('specification');
            $table->integer('view');
            $table->integer('download');
            $table->decimal('price');
            $table->integer('like');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('three_d_models');
    }
}
