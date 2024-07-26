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
        Schema::create('tender_items', function (Blueprint $table) {
            $table->bigIncrements('tender_item_id');
            $table->string('tender_item_info');
            $table->string('site_id');
            $table->string('component_id');
            $table->string('chainage_id');
            $table->string('tender_item_qty');
            $table->string('tender_item_unit');
            $table->string('tender_item_cost');
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
        Schema::dropIfExists('tender_items');
    }
};
