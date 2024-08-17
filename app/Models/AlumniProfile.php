<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlumniProfile extends Model
{
    use HasFactory;

    protected $table = 'alumni_profiles';

    protected $fillable = [
        'user_id',
        'profile_pic',
        'name',
        'who_am_i',
        'about_me',
        'location',
        'email',
        'phone_number',
        'github_link',
        'linkedin_link',
        'company_name',
        'position_held',
        'startWork_year',
        'endWork_year',
        'roles',
        'institution_name',
        'course_done',
        'startCourse_year',
        'endCourse_year',
        'skills',
        'languages',
        'hobbies',
    ];

    protected $casts = [
        'skills' => 'array',
        'languages' => 'array',
        'hobbies' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
