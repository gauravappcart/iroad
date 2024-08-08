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
        Schema::create('asset_requests', function (Blueprint $table) {
            $table->bigIncrements('vehicle_types_request_id');
            $table->string('site_id')->nullable();
            $table->string('component_id')->nullable();
             $table->integer('vehicle_types_id')->nullable();
             $table->integer('request_quantity')->nullable();
             $table->float('working_hrs')->nullable();
             $table->date('required_from_date')->nullable();
             $table->date('required_to_date')->nullable();
             $table->string('qc_comment')->nullable();
             $table->string('received_status')->nullable();
             $table->string('approved_by')->nullable();
             $table->tinyInteger('approved_quantity')->nullable();
             $table->date('approved_date')->nullable();
             $table->tinyInteger('request_status')->default (0)->comment('0:Not Received|1:Received');
             $table->tinyInteger('is_active')->default(1);
             $table->string('created_by',100)->nullable();
             $table->string('updated_by',100)->nullable();
             $table->softDeletes(); // <-- This will add a deleted_at field
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
        Schema::dropIfExists('asset_requests');
    }
};
