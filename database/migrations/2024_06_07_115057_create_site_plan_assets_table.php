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
        Schema::create('site_plan_assets', function (Blueprint $table) {
            $table->bigIncrements('site_plan_vehical_type_id');
            $table->string('site_id')->nullable();
            $table->string('vehicle_type_id')->nullable();
            $table->string('vehical_quantity')->nullable();
            $table->string('time_hours')->nullable();
            $table->string('cost_per_hour')->nullable();
            $table->string('estimated_total')->nullable(); //vehical_quantity*time_hours*cost_per_hour
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
        Schema::dropIfExists('site_plan_assets');
    }
};
