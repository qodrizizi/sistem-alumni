<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';
    protected $primaryKey = 'id_event';

    protected $fillable = [
        'nama_event', 'tanggal_mulai', 'tanggal_selesai',
        'lokasi', 'deskripsi'
    ];

    public function members()
    {
        return $this->belongsToMany(Alumni::class, 'event_members', 'event_id', 'alumni_id');
    }
}
