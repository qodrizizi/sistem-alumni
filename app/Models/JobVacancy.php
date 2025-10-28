<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobVacancy extends Model
{
    protected $table = 'job_vacancies';
    protected $fillable = [
        'user_id', 'perusahaan', 'posisi', 'lokasi', 'gaji',
        'tipe_pekerjaan', 'kualifikasi', 'deskripsi',
        'tanggal_buka', 'tanggal_tutup'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id_user');
    }
}
