<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('train_id')->index();
            $table->unsignedBigInteger('departurelocation_id')->index();
            $table->unsignedBigInteger('arrivallocation_id')->index();
            $table->dateTime('departure_time');
            $table->dateTime('arrival_time');
            $table->decimal('price', 5, 2);
            $table->timestamps();

            $table->foreign('departurelocation_id')->references('id')->on('locations')->onDelete('cascade');
            $table->foreign('arrivallocation_id')->references('id')->on('locations')->onDelete('cascade');
            $table->foreign('train_id')->references('id')->on('trains')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trips');
    }
}
