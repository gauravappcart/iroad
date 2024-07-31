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
        Schema::create('conflicts', function (Blueprint $table) {
            $table->bigIncrements('conflict_id');
            $table->integer('company_id')->nullable();
            $table->string('site_id')->nullable();
            $table->string('component_id')->nullable();
            $table->string('chainage_id')->nullable();
            $table->string('subject')->nullable();
            $table->string('conflict_description')->nullable();
            $table->string('other_reason_title')->nullable();
            // $table->tinyInteger('status')->default(0)->nullable();
            $table->tinyInteger('confirmed_by')->nullable();
            $table->tinyInteger('confirmed')->nullable();
            $table->date('confirmed_date')->nullable();
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
        Schema::dropIfExists('conflicts');
    }
};
