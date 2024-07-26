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
        Schema::create('component_monitering_activity_mapping', function (Blueprint $table) {
            $table->id();
            $table->integer('component_id');
            $table->integer('monitoring_activity_id');
            $table->softDeletes(); // <-- This will add a deleted_at fiel
            $table->string('created_by',100)->default(1);
            $table->string('updated_by',100);
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
        Schema::dropIfExists('component_monitering_activity_mapping');
    }
};
