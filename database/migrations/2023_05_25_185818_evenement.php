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
        Schema::create('evenement', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('typeEvent_id');
            $table->unsignedBigInteger('salle_id');
            $table->unsignedBigInteger('user_id');
            $table->string('eventName');
            $table->integer('guests');
            $table->string('ville');
            $table->date('datestart');
            $table->date('dateEnd');
            $table->foreign('typeEvent_id')->references('id')->on('_type_event')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('evenement');
    }
};
