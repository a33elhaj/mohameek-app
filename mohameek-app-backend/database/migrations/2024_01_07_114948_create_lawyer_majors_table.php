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
        Schema::create('lawyer_majors', function (Blueprint $table) {
            // $table->id();
            $table->foreignId('lawyer_id')->index();
            $table->foreign('lawyer_id')->on('lawyers')->references('id')->cascadeOnDelete();
            $table->foreignId('major_id')->index();
            $table->foreign('major_id')->on('majors')->references('id')->cascadeOnDelete();
            $table->primary(['major_id', 'lawyer_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lawyer_majors');
    }
};
