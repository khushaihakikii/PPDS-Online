<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('student_registrations', function (Blueprint $table) {
            // Tambahkan kolom untuk menyimpan path file
            $table->string('birth_certificate_path')->nullable()->after('parent_email');
            $table->string('family_card_path')->nullable()->after('birth_certificate_path');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('student_registrations', function (Blueprint $table) {
            //
        });
    }
};
