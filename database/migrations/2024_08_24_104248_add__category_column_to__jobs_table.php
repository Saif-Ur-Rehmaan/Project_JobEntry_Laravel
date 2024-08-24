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
        Schema::table('_jobs', function (Blueprint $table) {
            // add category column in jobs table
            $table->unsignedBigInteger("Category_id")->nullable();
            
            // add foeign key in jobs tablelink : _jobs(Category)<->_category(id)
            $table->foreign("Category_id")->references("id")->on("_categories");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('_jobs', function (Blueprint $table) {
            $table->dropForeign(["Category_id"]);
            $table->dropColumn("Category_id");
        });
    }
};
