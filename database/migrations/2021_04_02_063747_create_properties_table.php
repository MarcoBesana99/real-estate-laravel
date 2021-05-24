<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('address');
            $table->double('latitude');
            $table->double('longitude');
            $table->string('type');
            $table->string('status');
            $table->float('price');
            $table->integer('year');
            $table->string('contract');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');;
            $table->bigInteger('area');
            $table->integer('rooms');
            $table->integer('bedrooms');
            $table->integer('bathrooms');
            $table->integer('garages');
            $table->integer('parkings');
            $table->boolean('air_condition')->nullable();
            $table->boolean('laundry')->nullable();
            $table->boolean('refrigerator')->nullable();
            $table->boolean('washer')->nullable();
            $table->boolean('barbeque')->nullable();
            $table->boolean('lawn')->nullable();
            $table->boolean('sauna')->nullable();
            $table->boolean('wifi')->nullable();
            $table->boolean('dryer')->nullable();
            $table->boolean('microwave')->nullable();
            $table->boolean('swimming_pool')->nullable();
            $table->boolean('window_coverings')->nullable();
            $table->boolean('gym')->nullable();
            $table->boolean('outdoor_shower')->nullable();
            $table->boolean('tv_cable')->nullable();
            $table->boolean('villa')->nullable();
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
        Schema::dropIfExists('properties');
    }
}
