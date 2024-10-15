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
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->boolean('primary')->default(false);
            //$table->boolean('monday')->default(true);
            //$table->boolean('tuesday')->default(true);
            //$table->boolean('wednesday')->default(true);
            //$table->boolean('thursday')->default(true);
            //$table->boolean('friday')->default(true);
            //$table->boolean('saturday')->default(false);
            //$table->boolean('sunday')->default(false);
            $table->foreignId('branch_id')->constrained()->cascadeOnDelete();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departments');
    }
};
