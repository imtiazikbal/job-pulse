<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('candidate_education_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->enum('bechelors',['Honours','Masters','Doctorate','Degree Pass']);
            $table->enum('hsc',['Commerce','Science','Arts','Madrasha','Other']);
            $table->enum('ssc',['Commerce','Science','Arts','Madrasha','Other']);
            $table->string('university_name');
            $table->string('department');
            $table->year('hons_passing_year')->nullable();
            $table->string('cgpa');
            $table->string('hsc_college_name');
            $table->string('hsc_gpa');
            $table->year('hsc_passing_year');
            $table->string('hsc_group');
            $table->string('ssc_school_name');
            $table->year('ssc_passing_year');
            $table->string('ssc_group');
            $table->string('ssc-gpa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidate_education_details');
    }
};
