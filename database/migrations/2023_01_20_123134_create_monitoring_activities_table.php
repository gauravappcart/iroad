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
        Schema::create('monitoring_activities', function (Blueprint $table) {
            $table->bigIncrements('activity_id');
            $table->integer('company_id');
            $table->string('activity_name',250);
            $table->string('activity_description',500);
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
        Schema::dropIfExists('monitoring_activities');
    }
};
