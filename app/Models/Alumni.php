<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    protected $table = 'alumni';
    protected $primaryKey = 'id_alumni';
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'nama_lengkap',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'angkatan',
        'tahun_lulus',
        'alamat',
        'no_hp',
        'foto'
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id_user');
    }

    // Pekerjaan
    public function jobs()
    {
        return $this->hasMany(AlumniJob::class, 'alumni_id', 'id_alumni');
    }

    // Pendidikan
    public function education()
    {
        return $this->hasMany(AlumniEducation::class, 'alumni_id', 'id_alumni');
    }

    // Prestasi
    public function achievements()
    {
        return $this->hasMany(AlumniAchievement::class, 'alumni_id', 'id_alumni');
    }
}
