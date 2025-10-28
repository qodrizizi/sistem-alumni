<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlumniAchievement extends Model
{
    protected $table = 'alumni_achievements';
    protected $fillable = [
        'alumni_id', 'nama_prestasi', 'tingkat', 'penyelenggara', 'tahun', 'deskripsi'
    ];

    public function alumni()
    {
        return $this->belongsTo(Alumni::class, 'alumni_id', 'id_alumni');
    }
}
