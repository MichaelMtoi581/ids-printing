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
        Schema::create('verifications', function (Blueprint $table) {
    $table->id();

    $table->string('qr_token');
    $table->string('card_number')->nullable();

    $table->foreignId('staff_id')->nullable()
          ->constrained()->nullOnDelete();

    $table->string('file_no')->nullable();

    $table->enum('status', ['found', 'not_found', 'revoked']);

    $table->timestamp('attempted_at');

    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('verifications');
    }
};
