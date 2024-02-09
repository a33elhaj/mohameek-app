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
        Schema::create('customer__cases', function (Blueprint $table) {
            $table->id();
            $table->text('summary');
            $table->string('duration');
            $table->string('file')->nullable();
            $table->double('accepted_price')->nullable();
            $table->enum('status', ['pending', 'accepted', 'finished'])->default('pending');

            $table->foreignId('customer_id');
            $table->foreign('customer_id')->on('customers')->references('id')->cascadeOnDelete();

            $table->foreignId('major_id');
            $table->foreign('major_id')->on('majors')->references('id')->cascadeOnDelete();

            $table->foreignId('city_id')->nullable();
            $table->foreign('city_id')->on('cities')->references('id')->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer__cases');
    }
};
