<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $table = 'ratings';

    protected $fillable = [
        'nama_terapis',
        'jenis_layanan',
        'jadwal_layanan',
        'rating',
        'ulasan',
    ];

        public function terapis()
    {
        return $this->belongsTo(Terapis::class, 'terapis_id');
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id'); // kalau pakai users
    }
}
