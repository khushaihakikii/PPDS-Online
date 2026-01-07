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
        Schema::create('student_registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->enum('registration_type', ['student', 'parent']); // siswa atau wali
            $table->string('student_name');
            $table->date('student_birth_date');
            $table->enum('student_gender', ['male', 'female']);
            $table->text('student_address');
            $table->string('parent_name')->nullable(); // untuk wali
            $table->string('parent_phone');
            $table->string('parent_email');
            $table->year('school_year');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_registrations');
    }
};
