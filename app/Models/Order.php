<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable =[
        'nama_pemesan',
        'jenis_layanan',
        'jadwal_layanan',
        'status'
    ];
}
