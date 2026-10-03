<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('profil_sekolahs', function (Blueprint $table) {
            $table->string('instagram')->nullable()->after('akreditasi');
            $table->string('facebook')->nullable()->after('instagram');
            $table->string('twitter')->nullable()->after('facebook');
            $table->string('youtube')->nullable()->after('twitter');
            $table->string('tiktok')->nullable()->after('youtube');
        });
    }

    public function down(): void
    {
        Schema::table('profil_sekolahs', function (Blueprint $table) {
            $table->dropColumn(['instagram', 'facebook', 'twitter', 'youtube', 'tiktok']);
        });
    }
};
