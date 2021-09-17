<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Qualification extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'exam',
        'subject',
        'institute',
        'board',
        'year',
        'obtained_marks',
        'total_marks',
    ];


    public function user(){
        return $this->belongsTo(User::class , 'user_id');
    }
}
