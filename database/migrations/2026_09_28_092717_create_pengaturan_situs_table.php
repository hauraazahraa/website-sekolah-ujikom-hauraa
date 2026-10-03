<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengaturan_situs', function (Blueprint $table) {
            $table->id();
            $table->string('wa_merchandise', 20)->nullable();
            $table->string('wa_it', 20)->nullable();
            $table->string('email_it')->nullable();
            $table->unsignedInteger('stat_siswa')->default(1200);
            $table->unsignedInteger('stat_guru')->default(80);
            $table->unsignedInteger('stat_kelas')->default(30);
            $table->unsignedInteger('stat_prestasi')->default(15);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengaturan_situs');
    }
};
