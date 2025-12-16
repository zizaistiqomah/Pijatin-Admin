<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'reports';

    protected $fillable = [
        'customer_id',
        'description',
        'report_date',
        'phone',
    ];

    /**
     * Relasi ke Pelanggan
     */
    public function customer()
    {
        return $this->belongsTo(Pelanggan::class, 'customer_id');
    }
}
