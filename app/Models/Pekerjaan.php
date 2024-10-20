<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'tanggal',
        'pekerjaan',
        'lokasi',
        'jam',
        'tipe',
        'tingkat',
        'deskripsi',
        'gaji',
        'requirement'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function has_applicant()
    {
        return $this->hasMany(Applicant::class);
    }
}
