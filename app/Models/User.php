<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'contact_number',
        'date_of_birth',
        'registered_voter',
        'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function brgy_certificate()
    {
        return $this->hasMany(CertificateOfResidency::class, 'user_id', 'id');
    }

    public function brgy_health_certificate()
    {
        return $this->hasMany(BarangayHealthCertificate::class, 'user_id', 'id');
    }
    public function brgy_health_indigency()
    {
        return $this->hasMany(BarangayIndigency::class, 'user_id', 'id');
    }
    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'user_id', 'id');
    }
}
