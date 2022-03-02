<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('title');
            $table->longText('description');
            $table->tinyInteger('status');
            $table->string('image');
            $table->integer('category_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->integer('country_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->integer('genre_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
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
        Schema::dropIfExists('movies');
    }
}
