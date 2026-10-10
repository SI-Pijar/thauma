<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->string('judul_asli')->nullable()->after('judul');
            $table->string('nama_sumber', 150)->nullable()->after('judul_asli');
            $table->string('url_sumber', 500)->nullable()->after('nama_sumber');
            $table->string('bahasa_asal', 10)->default('en')->after('url_sumber');
        });
    }

    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn(['judul_asli', 'nama_sumber', 'url_sumber', 'bahasa_asal']);
        });
    }
};