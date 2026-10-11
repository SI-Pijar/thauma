<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'category_id',
        'judul',
        'judul_asli',
        'nama_sumber',
        'url_sumber',
        'bahasa_asal',
        'slug',
        'ringkasan',
        'isi',
        'thumbnail',
    ];

    protected $casts = [
        'terbit_pada' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function validator()
    {
        return $this->belongsTo(User::class, 'divalidasi_oleh');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    public function getPostTerbit()
    {
        return $this->join('users', 'users.id', '=', 'posts.user_id')
            ->join('categories', 'categories.id', '=', 'posts.category_id')
            ->select('posts.*', 'users.name as nama_penulis', 'categories.nama as nama_kategori')
            ->where('posts.status', 'terbit')
            ->orderBy('posts.terbit_pada', 'desc')
            ->get();
    }

    public function getPostById($id)
    {
        return $this->join('users', 'users.id', '=', 'posts.user_id')
            ->join('categories', 'categories.id', '=', 'posts.category_id')
            ->select('posts.*', 'users.name as nama_penulis', 'categories.nama as nama_kategori')
            ->where('posts.status', 'terbit')
            ->where('posts.id', $id)
            ->firstOrFail();
    }
}
