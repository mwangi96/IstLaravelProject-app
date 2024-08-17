<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationForJob extends Model
{
    use HasFactory;

    protected $table = 'applicationsforjobs';

    protected $fillable = [
        'name',
        'user_id',
        'email',
        'resume',
        'cover_letter',
        'job_id',
        'status',
    ];

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
