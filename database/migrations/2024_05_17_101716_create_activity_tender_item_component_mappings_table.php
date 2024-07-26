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
        Schema::create('activity_tender_item_component_mappings', function (Blueprint $table) {
            $table->bigIncrements('activity_tender_item_component_id');
            $table->string('monitor_tender_id')->nullable();
            $table->string('monitor_activity_id')->nullable();
            $table->string('tender_item_id')->nullable();
            $table->string('site_id')->nullable();
            $table->string('chainage_id')->nullable();
            $table->string('component_id')->nullable();
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
        Schema::dropIfExists('activity_tender_item_component_mappings');
    }
};
