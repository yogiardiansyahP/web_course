<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses';

    protected $fillable = [
        'name',
        'thumbnail',
        'description',
        'mentor',
        'status',
    ];

    public function materials()
    {
        return $this->hasMany(Material::class);
    }

    const STATUS_ACTIVE = 'aktif';
    const STATUS_INACTIVE = 'nonaktif';

    public static function getAvailableStatuses()
    {
        return [
            self::STATUS_ACTIVE,
            self::STATUS_INACTIVE,
        ];
    }
}
