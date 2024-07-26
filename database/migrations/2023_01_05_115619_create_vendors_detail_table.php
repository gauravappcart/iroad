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
        Schema::create('vendors_detail', function (Blueprint $table) {
            $table->bigIncrements('vd_id');
            $table->integer('user_id');
            $table->integer('material_type');
            $table->integer('material_id');  
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
        Schema::dropIfExists('vendors_detail');
    }
};
