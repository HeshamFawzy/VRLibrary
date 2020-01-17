<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullabel();
            $table->string('author')->nullabel();
            $table->string('publisher')->nullabel();
            $table->date('publishing_date')->nullabel();
            $table->string('category')->nullabel();
            $table->string('edition')->nullabel();
            $table->integer('pages')->nullabel();
            $table->integer('no_of_copies')->nullabel();
            $table->integer('no_of_borrowed')->nullabel();
            $table->boolean('available')->nullabel();
            $table->integer('shelf_Number')->nullabel();
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
        Schema::dropIfExists('books');
    }
}
