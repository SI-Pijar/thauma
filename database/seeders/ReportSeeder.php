<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class ReportSeeder extends Seeder
{
    public function run(): void
    {
        $member = User::where('email', 'member@thauma.test')->first();
        $editor = User::where('email', 'editor@thauma.test')->first();
        $post = Post::where('status', 'terbit')->first();
        $komentarPromo = Comment::where('isi', 'like', '%Promo%')->first();

        $editor->reports()->create([
            'comment_id' => $komentarPromo->id,
            'alasan' => 'Komentar berisi promosi dan tidak berhubungan dengan gambar.',
        ]);

        $member->reports()->create([
            'post_id' => $post->id,
            'alasan' => 'Mohon dicek ulang sumber artikel ini.',
        ]);
    }
}