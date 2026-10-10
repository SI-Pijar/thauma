<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('post_id')->nullable()->constrained('posts')->cascadeOnDelete();
            $table->foreignId('submission_id')->nullable()->constrained('submissions')->cascadeOnDelete();
            $table->smallInteger('nilai');
            $table->timestamps();

            $table->unique(['user_id', 'post_id']);
            $table->unique(['user_id', 'submission_id']);
        });

        DB::statement('ALTER TABLE votes ADD CONSTRAINT votes_satu_target CHECK (num_nonnulls(post_id, submission_id) = 1)');
        DB::statement('ALTER TABLE votes ADD CONSTRAINT votes_nilai_valid CHECK (nilai IN (1, -1))');
    }

    public function down(): void
    {
        Schema::dropIfExists('votes');
    }
};