<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    use HasFactory;

    protected $fillable = [
        'admission_title',
        'close_date',
    ];

    //relation with appliedstudent
    public function appliedStudent()
    {
        return $this->hasMany(AppliedStudent::class, 'user_id');
    }
}
