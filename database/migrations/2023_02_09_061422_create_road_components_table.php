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
        Schema::create('road_components', function (Blueprint $table) {
            $table->bigIncrements('component_id');
            $table->integer('company_id');
            $table->string('component_name',60);
            $table->string('component_class',60);
            $table->string('component_icon_file',500);
            $table->json('dimentionstype')->nullable();
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
        Schema::dropIfExists('road_components');
    }
};
