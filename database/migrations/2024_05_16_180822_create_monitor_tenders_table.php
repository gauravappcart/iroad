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
        Schema::create('monitor_tenders', function (Blueprint $table) {
            $table->bigIncrements('monitor_tender_id');
            $table->string('monitor_activity_id');
            $table->string('site_id');
            $table->string('component_id');
            $table->string('chainage_id');
            $table->string('monitored_tender_item');
            $table->string('monitor_item_unit');
            $table->string('created_by',100);
            $table->string('updated_by',100);
            $table->string('is_active');
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
        Schema::dropIfExists('monitor_tenders');
    }
};
