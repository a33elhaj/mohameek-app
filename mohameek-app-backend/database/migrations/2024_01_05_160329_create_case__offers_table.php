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
        Schema::create('case__offers', function (Blueprint $table) {
            $table->id();
            $table->double('price')->nullable();
            $table->enum('status',['accept','reject','pending'])->default('pending');

            $table->foreignId('lawyer_id');
            $table->foreign('lawyer_id')->on('lawyers')->references('id')->cascadeOnDelete();

            $table->foreignId('customer_case_id');
            $table->foreign('customer_case_id')->on('customer__cases')->references('id')->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('case__offers');
    }
};
