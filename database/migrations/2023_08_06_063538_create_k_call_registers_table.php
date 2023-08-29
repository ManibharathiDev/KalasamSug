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
        Schema::create('k_call_registers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cust_id');
            $table->foreign('cust_id')->references('id')->on('k_customer_registers')
            ->onDelete('cascade');
            $table->string('phoneno');
            $table->string('conperson');
            $table->string('Date');
            $table->string('work');
            $table->unsignedBigInteger('staff_id');
            $table->foreign('staff_id')->references('id')->on('users')
            ->onDelete('cascade');
            $table->string('status');
            $table->string('remarks');
            $table->string('completeperson')->nullable()->default(NULL);
            $table->string('completeddate')->nullable()->default(NULL);
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('k_call_registers');
    }
};
