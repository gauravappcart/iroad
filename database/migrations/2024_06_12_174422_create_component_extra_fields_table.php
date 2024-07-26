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
        Schema::create('component_extra_fields', function (Blueprint $table) {
            $table->bigIncrements('component_extra_field_id');
            $table->string('component_id')->nullable();
            $table->string('added_by')->nullable();
            $table->string('field_name')->nullable();
            $table->string('unit')->nullable();
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
        Schema::dropIfExists('component_extra_fields');
    }
};
