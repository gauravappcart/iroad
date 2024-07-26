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
            $table->integer('profit_center')->default(2)->after('id');
        });

        // Schema::table('crews', function (Blueprint $table) {
        //     $table->integer('profit_center')->default(2)->after('id');
        // });

        // Schema::table('diesel_accounts', function (Blueprint $table) {
        //     $table->integer('profit_center')->default(2)->after('id');
        // });

        // Schema::table('jobs', function (Blueprint $table) {
        //     $table->integer('profit_center')->default(2)->after('id');
        // });

        // Schema::table('petroleum', function (Blueprint $table) {
        //     $table->integer('profit_center')->default(2)->after('id');
        // });

        // Schema::table('users', function (Blueprint $table) {
        //     $table->integer('profit_center')->default(2)->after('id');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('tables', function (Blueprint $table) {
        //     //
        // });
    }
};
