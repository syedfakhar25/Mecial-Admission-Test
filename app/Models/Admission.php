<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    use HasFactory;

    protected $fillable = [
        'admission_title',
        'session',
        'start_date',
        'close_date',
        'status',
    ];

    //relation with appliedstudent
    public function appliedStudent()
    {
        return $this->hasMany(AppliedStudent::class, 'user_id');
    }
}
