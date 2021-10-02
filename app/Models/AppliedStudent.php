<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppliedStudent extends Model
{
    use HasFactory;

    protected $fillable=[
      'admission_id',
      'user_id',
      'status',
      'status_update_date',
      'apply_date',
    ];

    public function user(){
        return $this->belongsTo(User::class , 'user_id');
    }

    public function admission(){
        return $this->belongsTo(Admission::class , 'admission_id');
    }
}

