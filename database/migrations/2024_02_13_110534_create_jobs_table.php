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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('title');
            $table->string('description');
            $table->string('exprience');
            $table->longText('requirements');
            $table->longText('responsibilities');
            $table->longText('benefits');
            $table->enum('status', ['active', 'inactive'])->default('inactive');
            $table->string('location');
            $table->string('age');
            $table->string('salary');
            $table->string('vacancy');
            $table->string('tag');
            $table->string('type');
            $table->string('employment_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
