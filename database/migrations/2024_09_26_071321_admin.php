<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Admin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adminuser', function(Blueprint $table){
            $table->id();
            $table->text('fName');
            $table->text('lName');
            $table->string('email');
            $table->string('password');
            $table->timestamp('createdAt');
            $table->enum('deleted', ['1', '0']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
