<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryThreeDModelTable extends Migration
{
    public function up()
    {
        Schema::create('category_three_d_model', function (Blueprint $table) {
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->foreignId('three_d_model_id')->constrained()->onDelete('cascade');
            $table->unique(['category_id', 'three_d_model_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('category_three_d_model');
    }
}
