<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    protected $table = 'flight_table_name';
    protected $primaryKey = 'primary_key_name';
    // 자동 생성되는 타임스탬프를 비활성화하려면 주석을 제거하세요.
    //public $timestamps = false;

    protected $fillable = [
        'name',
        'destination',
    ];
}
