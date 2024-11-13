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
        Schema::create('external_pdks_entrances', function (Blueprint $table) {
            $table->id();
            $table->integer("company_id");
            $table->time("morning_entrance");
            $table->time("morning_exit");
            $table->bigInteger("activity_id");
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('external_pdks_entrances');
    }
};
