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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->time('morning_entrance')->nullable();
            $table->time('morning_exit')->nullable();
            $table->time('noon_entrance')->nullable();
            $table->time('noon_exit')->nullable();
            $table->foreignId('employee_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('shift_day_id')->nullable()->constrained();
            $table->integer('status')->default(0);
            $table->unsignedBigInteger('device_id')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activties');
    }
};
