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
          /*  $table->foreign('dep_id')
                    ->references('id')->on('departments')->onDelete('cascade');
            $table->foreign('role_id')
                    ->references('id')->on('roles')->onDelete('cascade');
              */      
                $table->unsignedBigInteger('dep_id');
                $table->unsignedBigInteger('role_id');
                $table->foreign('dep_id')
                    ->references('id')->on('departments')->onDelete('cascade');
                $table->foreign('role_id')
                    ->references('id')->on('roles')->onDelete('cascade');
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
