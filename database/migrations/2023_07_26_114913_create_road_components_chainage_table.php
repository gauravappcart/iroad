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
        Schema::create('road_components_chainage', function (Blueprint $table) {
            $table->bigIncrements('chainage_id');
            $table->integer('site_id');
            $table->integer('component_id');
            $table->string('from_length',20)->default(null);
            $table->string('to_length',20)->default(null);
            $table->string('chainage_foundation_height',20)->default(null);
             $table->string('chainage_pier_height',20)->default(null);
             $table->string('chainage_pier_cap_height',20)->default(null);
             $table->string('chainage_max_elevation_height',20)->default(null);
             $table->string('chainage_max_depth_at_center',20)->default(null);
             $table->string('chainage_width',20)->default(null);
             $table->string('chainage_thickness',20)->default(null);
             $table->string('chainage_height',20)->default(null);
            $table->string('from_lat',30)->nullable();
            $table->string('from_long',30)->nullable();
            $table->string('to_lat',30)->nullable();
            $table->string('to_long',30)->nullable();

            $table->integer('created_by')->default(1);
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
        Schema::dropIfExists('road_components_chainage');
    }
};
