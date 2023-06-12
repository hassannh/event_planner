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
        Schema::create('image_salle', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('salle_id');
            $table->string('images')->nullable();
            $table->foreign('salle_id')->references('id')->on('salle')->onDelete('cascade');
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
        Schema::dropIfExists('image_salle');
    }
};
