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
        Schema::create('employee_urgents', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('proximity')->comment('0-baba 1-anne 2-kardes | abi 3-akraba 4- arkadas')->nullable();
            $table->string('phone')->nullable();
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
        Schema::dropIfExists('employee_urgents');
    }
};
