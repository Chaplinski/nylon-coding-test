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
        Schema::create('submissions', function (Blueprint $table) {
            $table->id();
            //TODO do not accept null values
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('ssn')->unique();
            $table->boolean('is_enabled')->default(false);
            //TODO add boolean for is_enabled. Default to false.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submissions');
    }
};
