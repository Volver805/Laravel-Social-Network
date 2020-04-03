<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug');
            $table->unsignedBigInteger('board');
            $table->foreign('board')->references('id')->on('boards');
        });
        DB::table('categories')->insert(
            array(
            array(
                "name" => "Discussion",
                "slug" => "discussion",
                "board"=> 1
            ),array(
                "name" => "Events",
                "slug" => "events",
                "board"=> 1
            ),array(
                "name" => "Off topic",
                "slug" => "off",
                "board"=> 1
            ),
            array(
                "name" => "HTML & CSS & vanilla JS",
                "slug" => "basics",
                "board"=> 2
            ),
            array(
                "name" => "Node.js & npm",
                "slug" => "npm",
                "board"=> 2
            ),
            array(
                "name" => "Php & Laravel",
                "slug" => "php",
                "board"=> 2
            ),
            array(
                "name" => "Databases",
                "slug" => "database",
                "board"=> 2
            ),
            array(
                "name" => "Python",
                "slug" => "python",
                "board"=> 3
            ),
            array(
                "name" => "Mathematics & statistics",
                "slug" => "math",
                "board"=> 3
            ),
            array(
                "name" => "Machine learning",
                "slug" => "ml",
                "board"=> 3
            ))
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
