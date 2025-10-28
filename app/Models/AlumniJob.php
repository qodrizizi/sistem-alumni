<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlumniJob extends Model
{
    protected $table = 'alumni_jobs';
    protected $fillable = [
        'alumni_id', 'perusahaan', 'posisi', 'alamat_perusahaan',
        'bidang', 'mulai_bekerja', 'akhir_bekerja', 'status'
    ];

    public function alumni()
    {
        return $this->belongsTo(Alumni::class, 'alumni_id', 'id_alumni');
    }
}
