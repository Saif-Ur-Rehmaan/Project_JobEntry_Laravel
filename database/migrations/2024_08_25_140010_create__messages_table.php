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
        Schema::create('_messages', function (Blueprint $table) {
            $table->id();
            $table->string("Name")->nullable();
            $table->string("Email")->nullable()->unique();
            $table->string("Subject")->nullable();
            $table->text("Message")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_messages');
    }
};
