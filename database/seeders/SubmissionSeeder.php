<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class SubmissionSeeder extends Seeder
{
    public function run(): void
    {
        $member = User::where('email', 'member@thauma.test')->first();
        $admin = User::where('email', 'admin@thauma.test')->first();
        $faktaUnik = Category::where('slug', 'fakta-unik')->first();
        $budayaGeek = Category::where('slug', 'budaya-geek')->first();

        $daftarGambar = [
            [
                'data' => [
                    'category_id' => $faktaUnik->id,
                    'judul' => 'Foto Kiriman Pertama',
                    'gambar' => 'https://picsum.photos/seed/thauma1/800/600',
                    'deskripsi' => 'Gambar contoh dari seeder untuk menguji halaman galeri.',
                ],
                'status' => 'disetujui',
            ],
            [
                'data' => [
                    'category_id' => $budayaGeek->id,
                    'judul' => 'Foto Kiriman Kedua',
                    'gambar' => 'https://picsum.photos/seed/thauma2/800/600',
                    'deskripsi' => 'Gambar contoh kedua yang sudah disetujui admin.',
                ],
                'status' => 'disetujui',
            ],
            [
                'data' => [
                    'category_id' => $faktaUnik->id,
                    'judul' => 'Foto Kiriman Ketiga',
                    'gambar' => 'https://picsum.photos/seed/thauma3/800/600',
                    'deskripsi' => 'Gambar ini masih menunggu sehingga tidak tampil di galeri.',
                ],
                'status' => 'menunggu',
            ],
        ];

        foreach ($daftarGambar as $item) {
            $submission = $member->submissions()->create($item['data']);
            $submission->status = $item['status'];

            if ($item['status'] == 'disetujui') {
                $submission->divalidasi_oleh = $admin->id;
                $submission->divalidasi_pada = now();
            }

            $submission->save();
        }
    }
}