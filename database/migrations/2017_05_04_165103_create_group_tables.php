<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Schema for groups table in app database.
        Schema::create('groups', function(Blueprint $table){
            $table->increments('id');
            $table->integer('creator_id')->unsigned()->index();
            $table->string('creator_name');
            $table->string('group_name');
            $table->string('app_name');
            $table->string('description');
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
        Schema::dropifexists('groups');
    }
}
