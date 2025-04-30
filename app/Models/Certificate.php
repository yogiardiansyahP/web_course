<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'course_name',
        'certificate_url',
        'issued_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}