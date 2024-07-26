<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('assets_group', function (Blueprint $table) {
            $table->bigIncrements('id');  
            $table->string('group_name',80);                        
            $table->softDeletes(); // <-- This will add a deleted_at field      
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assets_group');
    }
};
