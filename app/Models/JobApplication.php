<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;
    protected $table="job_applications";
    protected $fillable=[
     
        'Job_id',
        'Name',
        'Email',
        'Portfolio',
        'CoverLetter',
        'CV',
    ];
}
