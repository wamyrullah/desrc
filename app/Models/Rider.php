<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rider extends Model
{
    protected $fillable = [
        'user_id',
        'nama',
        'panggilan',
        'number_plate',
        'team',
        'asal_kota',
        'tanggal_lahir',
        'no_kia',
        'photo_rider',
        'photo_kia',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
