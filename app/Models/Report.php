<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $table = 'reports';

    protected $fillable = ['post_id', 'submission_id', 'comment_id', 'alasan'];

    protected $casts = [
        'ditangani_pada' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function penangan()
    {
        return $this->belongsTo(User::class, 'ditangani_oleh');
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function submission()
    {
        return $this->belongsTo(Submission::class);
    }

    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }

    public function getLaporan()
    {
        return $this->join('users', 'users.id', '=', 'reports.user_id')
            ->select('reports.*', 'users.name as nama_pelapor')
            ->orderBy('reports.created_at', 'desc')
            ->get();
    }
}