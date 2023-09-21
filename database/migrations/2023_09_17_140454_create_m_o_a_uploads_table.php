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
        Schema::create('m_o_a_uploads', function (Blueprint $table) {
            $table->id();
            $table->string('course')->nullable()->default(NULL);
            $table->string('school_year')->nullable()->default(NULL);
            $table->string('company_name')->nullable()->default(NULL);
            $table->string('student_name')->nullable()->default(NULL);
            $table->string('file_name');
            $table->string('file');
            $table->string('valid_until')->nullable()->default(NULL);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_o_a_uploads');
    }
};
