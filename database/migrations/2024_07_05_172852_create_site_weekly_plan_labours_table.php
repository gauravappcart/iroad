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
        Schema::create('site_weekly_plan_labours', function (Blueprint $table) {
            $table->bigIncrements('site_weekly_plan_labour_id');
            $table->string('site_weekly_plan_id')->nullable();
            $table->string('site_id')->nullable();
            $table->string('component_id')->nullable();
            $table->string('chainage_id')->nullable();
            $table->string('labour_id')->nullable();
            $table->string('labour_quantity')->nullable();

            $table->tinyInteger('plain_or_lhs_rhs')->nullable()->comment('1:plan road|2:lhs road or rhs road');
            $table->tinyInteger('lhs_rhs_both')->nullable()->comment('1:lhs road|2:rhs road|3:both(lhs and rhs)');
            $table->tinyInteger('lhs_or_rhs_labour')->nullable()->comment('1:lhs|2:rhs)');

            $table->date('lhs_start_date')->nullable();
            $table->date('lhs_end_date')->nullable();

            $table->date('rhs_start_date')->nullable();
            $table->date('rhs_end_date')->nullable();
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
        Schema::dropIfExists('site_weekly_plan_labours');
    }
};
