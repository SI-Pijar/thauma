<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            PostSeeder::class,
            SubmissionSeeder::class,
            CommentSeeder::class,
            VoteSeeder::class,
            ReportSeeder::class,
        ]);
    }
}