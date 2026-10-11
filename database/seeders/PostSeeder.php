<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $editor = User::where('email', 'editor@thauma.test')->first();
        $admin = User::where('email', 'admin@thauma.test')->first();
        $sains = Category::where('slug', 'sains')->first();
        $faktaUnik = Category::where('slug', 'fakta-unik')->first();

        $daftarArtikel = [
            [
                'data' => [
                    'category_id' => $sains->id,
                    'judul' => 'Gurita Ternyata Punya Tiga Jantung',
                    'judul_asli' => 'Octopuses Have Three Hearts',
                    'nama_sumber' => 'Sumber Contoh',
                    'url_sumber' => 'https://example.com/gurita',
                    'bahasa_asal' => 'en',
                    'slug' => 'gurita-ternyata-punya-tiga-jantung',
                    'ringkasan' => 'Dua jantung memompa darah ke insang, satu lagi ke seluruh tubuh.',
                    'isi' => 'Gurita memiliki tiga jantung. Dua jantung kecil memompa darah melewati insang, sedangkan satu jantung utama mengalirkan darah ke seluruh tubuh. Darah gurita juga berwarna biru karena memakai hemosianin yang mengandung tembaga untuk mengangkut oksigen.',
                ],
                'status' => 'terbit',
            ],
            [
                'data' => [
                    'category_id' => $faktaUnik->id,
                    'judul' => 'Hiu Sudah Ada Sebelum Pohon',
                    'bahasa_asal' => 'id',
                    'slug' => 'hiu-sudah-ada-sebelum-pohon',
                    'ringkasan' => 'Hiu muncul jauh lebih dulu dibanding pohon pertama di Bumi.',
                    'isi' => 'Fosil menunjukkan hiu sudah ada sekitar 450 juta tahun lalu, sedangkan pohon pertama baru muncul sekitar 385 juta tahun lalu. Artinya hiu sudah berenang di laut puluhan juta tahun sebelum ada hutan di daratan.',
                ],
                'status' => 'terbit',
            ],
            [
                'data' => [
                    'category_id' => $sains->id,
                    'judul' => 'Madu Bisa Awet Sangat Lama',
                    'bahasa_asal' => 'id',
                    'slug' => 'madu-bisa-awet-sangat-lama',
                    'ringkasan' => 'Kadar air yang rendah membuat bakteri sulit hidup di dalam madu.',
                    'isi' => 'Madu memiliki kadar air rendah dan bersifat asam, sehingga bakteri dan jamur sulit berkembang di dalamnya. Selama disimpan tertutup rapat, madu bisa bertahan sangat lama tanpa basi.',
                ],
                'status' => 'diajukan',
            ],
        ];

        foreach ($daftarArtikel as $item) {
            $post = $editor->posts()->create($item['data']);
            $post->status = $item['status'];

            if ($item['status'] == 'terbit') {
                $post->divalidasi_oleh = $admin->id;
                $post->terbit_pada = now();
            }

            $post->save();
        }
    }
}
