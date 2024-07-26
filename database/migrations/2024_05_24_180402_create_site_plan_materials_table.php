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
        Schema::create('site_plan_materials', function (Blueprint $table) {
            $table->bigIncrements('site_plan_material_id');
            $table->string('site_id')->nullable();
            $table->string('material_type_id')->nullable();
            $table->string('material_id')->nullable();
            $table->string('material_unit_id')->nullable();
            $table->string('quantity')->nullable();
            $table->string('rate')->nullable();

            $table->string('created_by',100)->nullable();
            $table->string('updated_by',100)->nullable();
            $table->string('is_active')->nullable();
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
        Schema::dropIfExists('site_plan_materials');
    }
};
