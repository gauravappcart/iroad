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
        Schema::create('material_requests', function (Blueprint $table) {
            $table->id();
            $table->float(`request_quantity`);
            $table->string('material_type_id')->nullable();
            $table->string('material_id')->nullable();
            $table->tinyInteger('request_status')->default(0)->comment('0:Pending|1:Approved');;
            $table->float('qty_approved');
            $table->string('approved_by');
            $table->date('approved_date');
            $table->float('qty_received');
            $table->string('received_by',100)->nullable();
            $table->date('received_date');
            $table->string('site_id')->nullable();
            $table->string('component_id')->nullable();
            $table->tinyInteger('received_status')->default(0)->comment('0:Not Received|1:Received');
            $table->string('qc_comment')->nullable();
            $table->tinyInteger('add_to_cart')->default(0)->nullable();
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
        Schema::dropIfExists('material_requests');
    }
};
