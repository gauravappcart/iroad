<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
           
            $table->bigIncrements('id');   
            $table->string('type',40);  
            $table->string('make_type',80)->nullable();
            $table->string('model_name',80)->nullable();
            $table->string('vehicle_no',20)->nullable();
            $table->dateTime('registration_end')->nullable();
            $table->integer('vehicle_type')->nullable(); 
            $table->integer('operator')->nullable();

            $table->integer('profit_center')->nullable(); 
            $table->integer('owner')->nullable(); 
            $table->string('book_value',20)->nullable();
            $table->string('depreciation_value',20)->nullable();
            $table->string('reading_in',20)->nullable();
            $table->string('expected_reading',20)->nullable();
            $table->string('min_urea_alert',20)->nullable();
            $table->string('vehicle_photo',240)->nullable(); //file
            $table->string('fitness_certificate',240)->nullable(); //file
            $table->string('serv_repair',80)->nullable();
            $table->string('status',40)->nullable();
            $table->string('notes',2000)->nullable();
            $table->string('description',2000)->nullable();
           
            $table->softDeletes(); // <-- This will add a deleted_at field      
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
        Schema::dropIfExists('vehicles');
    }
}
