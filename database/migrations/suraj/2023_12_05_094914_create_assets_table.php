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
        Schema::create('assets', function (Blueprint $table) {
            $table->bigIncrements('id');  
            $table->string('asset_name',60);   
            $table->date('put_to_use')->nullable();
            $table->integer('asset_group')->nullable();
            $table->integer('asset_sub_group')->nullable();
            $table->integer('assetLocation')->nullable();
            $table->integer('asset_life_years')->nullable();
            $table->date('end_life_date')->nullable();
            $table->string('asset_quantity',20)->nullable();   
            $table->string('purchase_value',20)->nullable();   
            $table->date('sale_date')->nullable();
            $table->string('sale_value',20)->nullable();   
            $table->string('invoice_number',30)->nullable();   
            $table->date('invoice_date')->nullable();
            $table->string('finance_bank_name',60)->nullable();   
            $table->string('account_no',30)->nullable();   
            $table->string('loan_amount',20)->nullable();   
            $table->date('loan_start_date')->nullable();
            $table->date('loan_end_date')->nullable();
            $table->string('roi',10)->nullable();   
            $table->string('emi_amount',20)->nullable();   
            $table->date('emi_date')->nullable();
            $table->string('first_gross_value',20)->nullable();   
            $table->string('addition_during_period',20)->nullable();   
            $table->string('deduction',20)->nullable();   
            $table->string('second_gross_value',20)->nullable();   
            $table->string('acc_dep',20)->nullable();   
            $table->string('dep_deduction',20)->nullable(); 
                              
            $table->softDeletes(); // <-- This will add a deleted_at field      
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assets');
    }
};
