<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlumniEducation extends Model
{
    protected $table = 'alumni_education';
    protected $fillable = [
        'alumni_id', 'jenjang', 'institusi', 'jurusan',
        'tahun_mulai', 'tahun_selesai'
    ];

    public function alumni()
    {
        return $this->belongsTo(Alumni::class, 'alumni_id', 'id_alumni');
    }
}
