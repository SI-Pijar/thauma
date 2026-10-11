<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Submission;
use App\Models\User;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    public function run(): void
    {
        $member = User::where('email', 'member@thauma.test')->first();
        $editor = User::where('email', 'editor@thauma.test')->first();
        $post = Post::where('status', 'terbit')->first();
        $submission = Submission::where('status', 'disetujui')->first();

        $member->comments()->create([
            'post_id' => $post->id,
            'isi' => 'Baru tahu fakta ini, menarik sekali.',
        ]);

        $editor->comments()->create([
            'submission_id' => $submission->id,
            'isi' => 'Fotonya bagus, sudut ambilnya pas.',
        ]);

        $member->comments()->create([
            'submission_id' => $submission->id,
            'isi' => 'Promo pulsa murah, cek profil saya.',
        ]);
    }
}