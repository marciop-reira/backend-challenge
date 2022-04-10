<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->string('title');
            $table->string('url');
            $table->string('imageUrl');
            $table->string('newsSite');
            $table->text('summary');
            $table->timestamp('publishedAt');
            $table->timestamp('updatedAt');
            $table->boolean('featured');
            $table->longText('launches');
            $table->longText('events');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
