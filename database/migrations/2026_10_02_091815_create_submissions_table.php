<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('submissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('category_id')->constrained('categories');
            $table->string('judul');
            $table->string('gambar');
            $table->text('deskripsi')->nullable();
            $table->string('status', 20)->default('menunggu');
            $table->text('catatan_admin')->nullable();
            $table->foreignId('divalidasi_oleh')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('divalidasi_pada')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('submissions');
    }
};