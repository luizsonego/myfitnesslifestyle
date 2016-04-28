<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
	    $table->bigInteger('category_id');
            $table->bigInteger('author_id');
            $table->string('images',255);
	    $table->string('title',255);
            $table->text('summary');
	    $table->text('content');
	    $table->tinyInteger('active');
            $table->timestamps();
            $table->softDeletes();
	    $table->index('category_id');
	    $table->index('author_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('articles');
    }
}
