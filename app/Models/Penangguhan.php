<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penangguhan extends Model
{
    protected $table = 'penangguhan';

    protected $fillable = [
        'user_id',
        'alasan',
        'tanggal_mulai',
        'tanggal_selesai',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
