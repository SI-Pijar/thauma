<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Submission;
use App\Models\User;
use Illuminate\Database\Seeder;

class VoteSeeder extends Seeder
{
    public function run(): void
    {
        $member = User::where('email', 'member@thauma.test')->first();
        $editor = User::where('email', 'editor@thauma.test')->first();
        $post = Post::where('status', 'terbit')->first();
        $submission = Submission::where('status', 'disetujui')->first();

        $member->votes()->create(['post_id' => $post->id, 'nilai' => 1]);
        $member->votes()->create(['submission_id' => $submission->id, 'nilai' => 1]);
        $editor->votes()->create(['submission_id' => $submission->id, 'nilai' => -1]);
    }
}