<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    //
    protected $table='reservations';
    protected $fillable = [
        'user_id',
        'room_id',
        'reserved_date',
        'start_time',
        'end_time',
    ];  
}
