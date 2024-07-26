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
        Schema::create('site_weekly_plan_extra_fields', function (Blueprint $table) {
            $table->bigIncrements('site_weekly_plan_extra_field_id');
            $table->string('site_weekly_plan_id')->nullable();
            $table->string('site_id')->nullable();
            $table->string('component_id')->nullable();
            $table->string('chainage_id')->nullable();
            $table->string('component_extra_field_id')->nullable();
            $table->string('quantity')->nullable();
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
        Schema::dropIfExists('site_weekly_plan_extra_fields');
    }
};
