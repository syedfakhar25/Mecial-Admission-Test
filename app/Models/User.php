<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_type',
        'roll_no',
        'image',
        'entry_marks',
        'category',
        'preference',
        'test_type',
        'test_center',
        'chem',
        'chem',
        'bio',
        'physics',
        'test_date',
        'approved',
        'hafiz_quran',
        'guardian_name',
        'mother_name',
        'gender',
        'nationality',
        'dob',
        'domicile',
        'area',
        'cnic',
        'address',
        'landline',
        'mobile',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    //relation with qualification model
    public function qualification()
    {
        return $this->hasMany(Qualification::class, 'user_id');
    }
    //relation with document model
    public function document()
    {
        return $this->hasMany(Document::class, 'user_id');
    }
}
