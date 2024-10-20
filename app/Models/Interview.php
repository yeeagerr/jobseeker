<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'pertanyaan',
    ];

    public function company_interview()
    {
        return $this->belongsTo(Company::class);
    }

    protected $cast = [
        'pertanyaan' => 'array'
    ];
}
