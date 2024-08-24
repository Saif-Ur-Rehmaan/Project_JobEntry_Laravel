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
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("User_Id")->nullable(false);
            $table->unsignedBigInteger("Job_Id")->nullable(false);
            $table->text("Portfolio")->nullable();
            $table->text("CoverLetter")->nullable();
            $table->text("CV")->nullable();

            $table->foreign("User_id")->references("id")->on("users");
            $table->foreign("Job_id")->references("id")->on("_jobs");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_application');
    }
};
