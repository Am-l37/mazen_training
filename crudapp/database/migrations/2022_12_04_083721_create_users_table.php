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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
          /*  $table->foreign('dep_id')
                ->references('id')->on('departments')->onDelete('cascade');
                */
            $table->unsignedBigInteger('dep_id')->nullable();
               $table-> foreign('dep_id')->nullable()->constrained()->references('id')->on('departments');
              // $table->foreignId('dep_id')->nullable()->constrained()->references('id')->on('departments');
           // $table->integer('dep_id');
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
        Schema::dropIfExists('users');
    }
};
