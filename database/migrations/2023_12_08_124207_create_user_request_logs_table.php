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
        Schema::create('user_request_logs', function (Blueprint $table) {
            $table->id();
            $table->string('token')->nullable();
            $table->string('ip');
            $table->string('url');
            $table->string('method');
            $table->json('request');
            $table->json('response');
            $table->timestamp('request_time');
            $table->string('execution_time');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_request_logs');
    }
};
