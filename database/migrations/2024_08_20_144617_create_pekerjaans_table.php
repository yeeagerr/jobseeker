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
        Schema::create('pekerjaans', function (Blueprint $table) {
            $table->id();
            $table->foreignId("company_id")->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string("tanggal");
            $table->string("pekerjaan");
            $table->string("lokasi");
            $table->enum("jam", ['full time', 'part time', 'half time', 'satu proyek', 'kapan saja']);
            $table->enum('tipe', ['setiap hari', 'fleksibel', 'shift', 'kerja di tempat', 'metode online']);
            $table->enum('tingkat', ['pemula', 'junior', 'middle', 'senior', 'sepuh']);
            $table->string("deskripsi");
            $table->string("gaji");
            $table->text("requirement");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pekerjaans');
    }
};
