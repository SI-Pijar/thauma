<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('post_id')->nullable()->constrained('posts')->cascadeOnDelete();
            $table->foreignId('submission_id')->nullable()->constrained('submissions')->cascadeOnDelete();
            $table->foreignId('comment_id')->nullable()->constrained('comments')->cascadeOnDelete();
            $table->text('alasan');
            $table->string('status', 20)->default('menunggu');
            $table->foreignId('ditangani_oleh')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('ditangani_pada')->nullable();
            $table->timestamps();
        });

        DB::statement('ALTER TABLE reports ADD CONSTRAINT reports_satu_target CHECK (num_nonnulls(post_id, submission_id, comment_id) = 1)');
    }

    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};