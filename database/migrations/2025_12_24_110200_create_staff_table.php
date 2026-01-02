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
    Schema::create('staff', function (Blueprint $table) {
        $table->id();

        $table->string('file_no', 50)->unique();
        $table->string('full_name', 100);
        $table->string('email', 100)->unique();

        $table->foreignId('department_id')
              ->constrained()
              ->cascadeOnDelete();

        $table->foreignId('designation_id')
              ->constrained()
              ->cascadeOnDelete();

        $table->string('phone_number', 20)->nullable();

        $table->enum('staff_type', ['permanent', 'contract', 'temporary'])
              ->default('permanent');

        $table->string('educational_level', 50)->nullable();

        $table->text('residential_address')->nullable();

        $table->string('photo_path')->nullable();



        $table->enum('status', ['active', 'inactive', 'retired'])
              ->default('active');
        
              
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
   public function down(): void
{
    Schema::dropIfExists('staff');
}

};
