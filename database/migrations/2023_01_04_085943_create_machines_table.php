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
        Schema::create('machines', function (Blueprint $table) {
            $table->bigIncrements('machine_id');
            $table->string('machine_name',100);
            $table->string('machine_number',50)->nullable();
            $table->string('machine_type',50)->nullable();
            $table->string('machine_uid',50)->nullable();
            $table->string('machine_hrs',20)->nullable();
            $table->string('machine_cost',40)->nullable();
            $table->string('machine_cost_per_hrs',40)->nullable();
            $table->tinyInteger('is_active')->default('0');      
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
        Schema::dropIfExists('machines');
    }
};
