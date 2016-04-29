<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('authors', function (Blueprint $table) {
	    $table->bigIncrements('id');
            $table->bigInteger('user_id');
	    $table->string('first_name',155);
            $table->string('last_name',155);
            $table->string('avatar',155);
            $table->text('description');
            $table->tinyInteger('active');
            $table->timestamps();
            $table->softDeletes();
	    $table->index('user_id');
	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::drop('authors');
    }
}
