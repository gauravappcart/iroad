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
        Schema::create('users', function (Blueprint $table) {

            $table->bigIncrements('user_id');
            $table->string('first_name',20)->nullable();
            $table->string('last_name',20)->nullable();
            $table->string('email_id',50);
            $table->string('mobile',15)->nullable();
            $table->tinyInteger('user_role');
            $table->string('password',20);
            $table->string('api_token',150);
            $table->integer('created_by')->default('0');
            $table->tinyInteger('is_active')->default('0');
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
        Schema::dropIfExists('users');
    }
};
