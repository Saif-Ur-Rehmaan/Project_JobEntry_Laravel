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
        Schema::create('_jobs', function (Blueprint $table) {
            $table->id();
            $table->string("JobName")->nullable();
            $table->string("JobLocation")->nullable();
            $table->string("JobNature")->nullable();
            $table->string("JobMinPrice")->nullable()->default("0.00");
            $table->string("JobMaxPrice")->nullable()->default("0.00");
            $table->string("JobPublishedOn")->nullable();
            $table->string("JobDateLine")->nullable();
            $table->string("JobVaccencies")->nullable();
            $table->text("JobDescription")->nullable();
            $table->text("JobResponsiblity")->nullable();
            $table->text("JobCompanyImage")->nullable();
            $table->text("JobCompanyDetail")->nullable();
            $table->text("JobQualification")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_jobs');
    }
};
