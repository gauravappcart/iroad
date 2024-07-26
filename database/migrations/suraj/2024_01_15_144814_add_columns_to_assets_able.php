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
        Schema::table('assets', function (Blueprint $table) {
            $table->string('insurance_cert',250)->nullable()->after('asset_photo'); 
            $table->dateTime('insurance_end')->nullable()->after('insurance_cert'); 
            $table->dateTime('upcoming_maintenance')->nullable()->after('end_life_date');              
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('assets', function (Blueprint $table) {           
          
        });
    }
};
