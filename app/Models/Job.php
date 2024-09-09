<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'qualifications',
        'location','salary', 'image',

    ];
    // In the Job model (Job.php)
public function user()
{
    return $this->belongsTo(User::class);
}

}