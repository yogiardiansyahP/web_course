<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Materi extends Model
{
    protected $fillable = ['course_id', 'nama_materi', 'slug'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($materi) {
            $materi->slug = Str::slug($materi->nama_materi);
        });
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
