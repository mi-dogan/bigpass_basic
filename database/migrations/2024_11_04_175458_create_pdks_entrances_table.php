<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pdks_entrances', function (Blueprint $table) {
            $table->id();
            $table->integer("company_id");
            $table->time("morning_entrance");
            $table->time("morning_exit");
            $table->time("noon_entrance");
            $table->time("noon_exit");
            $table->bigInteger("employee_id");
            $table->bigInteger("shift_day_id");
            $table->integer("status");
            $table->bigInteger("device_id");
            $table->string("device_type");
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pdks_entrances');
    }
};
