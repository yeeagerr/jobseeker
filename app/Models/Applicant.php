<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;

    protected $fillable = [
        'pekerjaan_id',
        'user_id',
        'company_id',
        'qna',
        'resume'
    ];

    public function pekerjaan()
    {
        return $this->belongsTo(Pekerjaan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
