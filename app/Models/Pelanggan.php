<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'pelanggans';

    // Primary key (default: id)
    protected $primaryKey = 'id';

    // Field yang bisa diisi (fillable)
    protected $fillable = [
        'nama',
        'jenis_kelamin',
        'ponsel',
        'email',
        'status',
        'tanggal_bergabung',
    ];

    public $timestamps = true;

    // (Opsional) Casting tanggal_bergabung ke format tanggal
    protected $casts = [
        'tanggal_bergabung' => 'date',
    ];
}
