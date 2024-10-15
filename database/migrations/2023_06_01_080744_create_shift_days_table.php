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
        Schema::create('shift_days', function (Blueprint $table) {
            $table->id();
            $table->integer('type')->comment('1-monday 2-tuesday 3-wednesday 4-thursday 5-friday 6-saturday 7-sunday');
            $table->boolean('status')->default(true);
            $table->time('morning_entrance');
            $table->time('morning_exit');
            $table->time('noon_entrance')->nullable();
            $table->time('noon_exit')->nullable();
            $table->time('option');
            $table->foreignId('shift_id')->constrained()->cascadeOnDelete();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shift_days');
    }
};
