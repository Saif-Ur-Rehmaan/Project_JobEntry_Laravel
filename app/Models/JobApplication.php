<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;
    protected $table="job_applications";
    protected $fillable=[
        'User_id',
        'Job_id',
        'Portfolio',
        'CoverLetter',
        'CV',
    ];
}
