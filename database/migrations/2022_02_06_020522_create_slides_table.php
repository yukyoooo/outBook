<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slides', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('book_title', 50);
            $table->string('book_detail', 500)->nullable();
            $table->string('book_author', 50)->nullable();
            $table->date('book_publishedDate')->nullable();
            $table->string('output',500)->nullable();
            $table->string('image_path')->nullable();
            $table->string('slides_path')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('slides');
    }
}
