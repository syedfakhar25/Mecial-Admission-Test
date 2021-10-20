<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'matric',
        'fsc',
        'state_subject',
        'cnic',
        'state_subject',
        'domicile',
        'prc',
        'mcat_result',
        'signature',

    ];
    private $user_id;

    public function user(){
        return $this->belongsTo(User::class , 'user_id');
    }
}
