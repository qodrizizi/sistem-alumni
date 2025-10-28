<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventMember extends Model
{
    protected $table = 'event_members';
    protected $fillable = ['event_id', 'alumni_id', 'status'];
}
