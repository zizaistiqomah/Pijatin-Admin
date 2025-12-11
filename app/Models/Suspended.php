<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suspended extends Model
{
    protected $table = 'suspended';

    protected $fillable = [
        'nama',
        'jenis_kelamin',
        'tipe_pengguna',
        'tanggal',
        'status',
    ];

    public $timestamps = true;
}
