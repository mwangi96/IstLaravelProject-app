<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationsForJobs extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_id', 'user_id', 'name', 'email', 'resume', 'cover_letter','status'
    ];

    // Define the relationship with the Job model
    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // Define the relationship with the AlumniProfile model
    public function alumniProfile()
{
    return $this->belongsTo(AlumniProfile::class, 'user_id', 'user_id');
}

}
