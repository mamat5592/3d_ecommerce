<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('three_d_model_id')->constrained()->onDelete('cascade');
            $table->string('address');
            $table->boolean('is_primary')->default(false);
        });
    }

    public function down()
    {
        Schema::dropIfExists('images');
    }
}
