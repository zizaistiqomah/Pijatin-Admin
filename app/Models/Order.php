<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pelanggan;
use App\Models\Terapis;

class Order extends Model
{
    use HasFactory;
    protected $fillable =[
        'nama_pemesan',
        'jenis_layanan',
        'jadwal_layanan',
        'status',
        'pelanggan_id',
        'terapis_id',
        'layanan',
        'alamat',
        'harga_layanan',
        'tanggal_pesan',
        'tanggal_layanan',
        'layanan_tambahan',
        'durasi',
        'total_harga',
        'metode',
    ];

    protected $table = 'orders'; 
    protected $dates = ['jadwal_layanan', 'created_at', 'updated_at'];

    public function terapis()
    {
        return $this->belongsTo(Terapis::class, 'terapis_id');
    }

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'pelanggan_id');
    }

}
