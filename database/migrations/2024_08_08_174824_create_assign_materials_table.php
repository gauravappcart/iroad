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
        Schema::create('assign_materials', function (Blueprint $table) {
            $table->bigIncrements('assign_material_id');
            $table->string('material_request_id');
            $table->float('request_quantity');
            $table->float('received_quantity');

            $table->float('qty_received')->nullable();
            $table->string('received_by',100)->nullable();
            $table->date('received_date')->nullable();

            $table->string('qc_comment')->nullable();

            $table->float('qty_approved')->nullable();
            $table->string('approved_by')->nullable();
            $table->date('approved_date')->nullable();
            $table->tinyInteger('is_active')->default(1);
            $table->string('created_by',100)->nullable();
            $table->string('updated_by',100)->nullable();
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
        Schema::dropIfExists('assign_materials');
    }
};
