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
        Schema::create('o_j_t_information', function (Blueprint $table) {
            $table->id();
            $table->string('studentNum');
            $table->string('company_name')->nullable()->default(NULL);
            $table->string('company_address')->nullable()->default(NULL);
            $table->string('nature_of_bus')->nullable()->default(NULL);
            $table->string('nature_of_link')->nullable()->default(NULL);
            $table->string('level')->nullable()->default(NULL);
            $table->date('start_date')->nullable()->default(NULL);
            $table->date('finish_date')->nullable()->default(NULL);
            $table->string('report_time')->nullable()->default(NULL);
            $table->string('contact_name')->nullable()->default(NULL);
            $table->string('contact_position')->nullable()->default(NULL);
            $table->string('contact_number')->nullable()->default(NULL);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('o_j_t_information');
    }
};
