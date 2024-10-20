<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Auth\Authenticatable as AuthenticatableCompany;
// use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Company extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nama',
        'email',
        'deskripsi',
        'lokasi',
        'size',
        'industri',
        'logo',
        'banner',
        'link',
        'password',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
        ];
    }

    protected $cast = [
        'pertanyaan' => 'array'
    ];

    public function has_jobs()
    {
        return $this->hasMany(Pekerjaan::class);
    }

    public function has_review()
    {
        return $this->hasMany(Review::class);
    }

    public function has_interview()
    {
        return $this->hasOne(Interview::class);
    }

    public function has_applicant()
    {
        return $this->hasMany(Applicant::class);
    }
}
