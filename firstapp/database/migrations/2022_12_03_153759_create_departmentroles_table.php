<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departmentroles', function (Blueprint $table) {
            $table->id();
           // $table->foreign('dep_id')->reference('id')->on('departments');
            //$table->foreign('role_id')->reference('id')->on('roles');
            $table->integer('dep_id');
            $table->integer('role_id');
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
        Schema::dropIfExists('departmentroles');
    }
};
