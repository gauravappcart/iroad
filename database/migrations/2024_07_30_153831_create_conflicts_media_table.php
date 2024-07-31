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
        Schema::create('conflicts_media', function (Blueprint $table) {
            $table->bigIncrements('conflict_media_id');
            $table->string('conflict_id')->nullable();
            $table->string('filename')->nullable();
            $table->string('filepath')->nullable();
            $table->string('fileurl')->nullable();
            $table->string('thumburl')->nullable();
            $table->integer('filesize')->nullable();
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
        Schema::dropIfExists('conflicts_media');
    }
};
