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
        Schema::create('lawyers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone')->unique();
            $table->string('password');
            $table->string('email')->nullable();
            $table->string('image')->nullable();
            $table->json('majors')->nullable();

            $table->enum('type', ['comapny', 'office', 'freelancer', 'trainee'])->default('freelancer');
            $table->enum('status', ["suspended", "active", "pending", "under_review"])->default('pending');
            $table->timestamp('email_verified_at')->nullable();

            $table->rememberToken();

            // $table->string('website')->nullable();
            // $table->string('company_name')->nullable();
            // $table->string('company_phone')->nullable();
            // $table->string('address')->nullable();
            // $table->string('license_num')->nullable();
            // $table->date('license_end_date')->nullable();
            // $table->date('birthday')->nullable();
            // $table->string('license_image')->nullable();
            // $table->string('image')->nullable();
            // $table->string('cover_image')->nullable();
            // $table->double('avg_rate', 5, 1)->default(0);
            // $table->text('about_you')->nullable();
            // $table->integer('replay_count')->default(0);
            // $table->string('register_num')->nullable();
            // $table->text('education')->nullable();
            // $table->text('languages')->nullable();
            // $table->enum('sex',["male","female"])->default('male');
            // $table->string('activation_code')->nullable();
            // $table->string('validation_code')->nullable();
            // $table->timestamp('started_at')->nullable();
            // $table->enum('lawyer_status',['online','offline'])->nullable();
            // $table->string('active_time')->default(0);
            // $table->timestamp('last_active_at')->nullable();
            // $table->integer('view_count')->default(0);


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lawyers');
    }
};
