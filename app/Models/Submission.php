<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    use HasFactory;

    protected $table = 'submissions';

    protected $fillable = ['category_id', 'judul', 'gambar', 'deskripsi'];

    protected $casts = [
        'divalidasi_pada' => 'datetime',
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

    public function getGaleri()
    {
        return $this->join('users', 'users.id', '=', 'submissions.user_id')
            ->join('categories', 'categories.id', '=', 'submissions.category_id')
            ->select('submissions.*', 'users.name as nama_pengirim', 'categories.nama as nama_kategori')
            ->where('submissions.status', 'disetujui')
            ->orderBy('submissions.divalidasi_pada', 'desc')
            ->get();
    }

    public function getGaleriById($id)
    {
        return $this->join('users', 'users.id', '=', 'submissions.user_id')
            ->join('categories', 'categories.id', '=', 'submissions.category_id')
            ->select('submissions.*', 'users.name as nama_pengirim', 'categories.nama as nama_kategori')
            ->where('submissions.status', 'disetujui')
            ->where('submissions.id', $id)
            ->firstOrFail();
    }
}