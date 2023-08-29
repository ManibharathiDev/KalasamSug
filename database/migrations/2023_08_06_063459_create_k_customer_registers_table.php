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
        Schema::create('k_customer_registers', function (Blueprint $table) {
            $table->id();
            $table->string('comname');
            $table->string('name');
            $table->string('phone');
            $table->string('mobile');
            $table->string('email');
            $table->string('serialNo');
            $table->string('gstno');
            $table->string('refname');
            $table->string('pack');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('k_customer_registers');
    }
};
