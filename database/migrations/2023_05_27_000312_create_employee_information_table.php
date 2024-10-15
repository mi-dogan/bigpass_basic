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
        Schema::create('employee_information', function (Blueprint $table) {
            $table->id();
            $table->text('adress')->nullable();
            $table->boolean('marital_status')->default(false);
            $table->integer('obstacle_rating')->comment('0-yok 1-orta 2-yüksek')->default(0);
            $table->string('nationality')->default('TC');
            $table->integer('child_count')->nullable();
            $table->integer('educational_level')->comment('0-yok 1-ortaokul 2-lise 3-üniversite 4-yüksek lisans')->default(1);
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
        Schema::dropIfExists('employee_information');
    }
};
