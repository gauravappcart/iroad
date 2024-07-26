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
        Schema::create('sites', function (Blueprint $table) {
            $table->bigIncrements('site_id');
            $table->string('site_name',60);
            $table->string('road_name',100);
            $table->string('road_length',30)->default('0');
            $table->integer('no_of_junction')->default('0');
            $table->string('project_amount',20);
            $table->date('proposed_start_date')->nullable();
            $table->date('proposed_end_date')->nullable();
            $table->string('design_chainage',20)->nullable();
            $table->date('actual_start_date')->nullable();
            $table->date('actual_end_date')->nullable();
            $table->tinyInteger('has_started')->default('0');
            $table->tinyInteger('is_divided')->default('0');
            $table->tinyInteger('has_lhs_started')->default('0');
            $table->date('lhs_starting_date')->nullable();
            $table->tinyInteger('has_rhs_started')->default('0');
            $table->date('rhs_starting_date')->nullable();
            $table->tinyInteger('is_further_devided')->default('0');
            $table->tinyInteger('has_further_division_started')->default('0');
            $table->integer('created_by')->default('0');
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
        Schema::dropIfExists('sites');
    }
};
