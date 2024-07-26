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
        Schema::create('site_plan_machines', function (Blueprint $table) {
            $table->bigIncrements('site_plan_machine_id');
            $table->string('site_id')->nullable();
            $table->string('machine_type_id')->nullable();
            $table->string('machine_id')->nullable();
            $table->string('no_of_machines')->nullable();
            $table->string('no_of_hours')->nullable();
            $table->string('machine_cost_pr_hrs')->nullable();
            $table->string('estimated_total')->nullable(); //no_of_machines*no_of_hours*machine_cost_per_hrs( from machines table)
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
        Schema::dropIfExists('site_plan_machines');
    }
};
