<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = ['nama', 'slug'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }

    public function getKategori()
    {
        return $this->orderBy('nama')->get();
    }
}