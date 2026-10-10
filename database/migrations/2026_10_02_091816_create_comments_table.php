<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('post_id')->nullable()->constrained('posts')->cascadeOnDelete();
            $table->foreignId('submission_id')->nullable()->constrained('submissions')->cascadeOnDelete();
            $table->text('isi');
            $table->timestamps();
        });

        DB::statement('ALTER TABLE comments ADD CONSTRAINT comments_satu_target CHECK (num_nonnulls(post_id, submission_id) = 1)');
    }

    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};