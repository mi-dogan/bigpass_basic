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
        Schema::create('companys', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('company_admin');
            $table->string('admin_email');
            $table->string('admin_password');

            $table->integer('branch_limit');
            $table->integer('department_limit');
            $table->integer('position_limit');
            $table->integer('worker_limit');
            $table->integer('shift_limit');


            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companys');
    }
};
