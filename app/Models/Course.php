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
        'price'
    ];

    // Relasi ke tabel materials
    public function materials()
    {
        return $this->hasMany(Material::class);
    }

    public function materis()
    {
        return $this->hasMany(Materi::class);
    }

    // Status konstanta
    const STATUS_ACTIVE = 'aktif';
    const STATUS_INACTIVE = 'nonaktif';

    // Method helper untuk daftar status
    public static function getAvailableStatuses()
    {
        return [
            self::STATUS_ACTIVE,
            self::STATUS_INACTIVE,
        ];
    }
}
