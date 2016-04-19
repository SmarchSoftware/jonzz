<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateJonzzTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {        
        Schema::create('attributes', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name')->length(255)->required();
            $table->string('slug')->length(32)->required();
            $table->integer('value')->default('0')->required();
            $table->text('notes');
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
        Schema::drop('attributes');
    }

}
