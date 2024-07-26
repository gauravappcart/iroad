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
        Schema::create('coordinates', function (Blueprint $table) {

            $table->bigIncrements('coord_id');
            $table->integer('route')->default('1');
            $table->string('latitude',60);
            $table->string('longitude',60);
            $table->softDeletes(); // <-- This will add a deleted_at fiel  
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
        Schema::dropIfExists('coordinates');
    }
};
