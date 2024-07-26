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
        Schema::create('site_plan_activities', function (Blueprint $table) {
            $table->bigIncrements('site_plan_activity_id');
            $table->string('site_id')->nullable();
            $table->string('chainage_id')->nullable();
            $table->string('component_id')->nullable();
            $table->string('activity_id')->nullable();
            $table->string('numbers_of_days')->nullable();
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
        Schema::dropIfExists('site_plan_activities');
    }
};
