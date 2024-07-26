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
        Schema::create('materials', function (Blueprint $table) {
            $table->bigIncrements('material_id');
            $table->string('material_name',100);
            $table->string('material_type',50)->nullable();
            $table->string('material_unit',50)->nullable();
            $table->integer('site_id')->nullable();
            $table->string('material_cost',40)->nullable();
            $table->string('material_cost_per_unit',40)->nullable();
            $table->string('created_by',40)->nullable();
            $table->string('updated_by',40)->nullable();
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
        Schema::dropIfExists('materials');
    }
};
