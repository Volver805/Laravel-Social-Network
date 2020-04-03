<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boards', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('color');
        });
        DB::table('boards')->insert(
            array(
                array("name"=>"General",
                "color" => "green"), 
                array(
                    "name"=>"Web Development",
                    "color" => "blue"
                ),
                array(
                    "name"=>"Data Science & Visualization ",
                    "color" => "orange"
                )
            )
        );
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boards');
    }
}
