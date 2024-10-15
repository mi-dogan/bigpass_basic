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
        Schema::create('employee_cards', function (Blueprint $table) {
            $table->id();
            $table->string('registration_number')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->date('birthdate')->nullable();
            $table->string('volume_number')->nullable();
            $table->string('serial_number')->nullable();
            $table->string('family_serial_number')->nullable();
            $table->string('identification_number')->nullable();
            $table->string('retired_registration_number')->nullable();
            $table->string('neighbourhood')->nullable();
            $table->integer('blood_group')->nullable();
            $table->string('signature')->nullable();
            $table->string('card_no');
            $table->foreignId('city_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('district_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('birth_city_id')->nullable()->constrained('cities', 'id')->cascadeOnDelete();
            $table->foreignId('birth_district_id')->nullable()->constrained('districts', 'id')->cascadeOnDelete();
            $table->foreignId('department_id')->constrained()->cascadeOnDelete()->default(1);
            $table->foreignId('employee_id')->constrained()->cascadeOnDelete();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_cards');
    }
};
