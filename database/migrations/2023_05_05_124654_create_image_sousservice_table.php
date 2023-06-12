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
        Schema::create('image_sousservice', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sous_service_id');
            $table->string('images')->nullable();
            $table->foreign('sous_service_id')->references('id')->on('sous_service')->onDelete('cascade');
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
        Schema::dropIfExists('image_sousservice');
    }
};
