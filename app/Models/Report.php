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
        'pelanggan_id',
        'therapist_id',
        'order_id',
        'description',
        'evidence_link',
        'status'
    ];

    /**
     * Relasi ke Pelanggan
     */
    public function customer()
    {
        return $this->belongsTo(Pelanggan::class, 'customer_id');
    }

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'customer_id');
    }

    public function therapist()
    {
        return $this->belongsTo(Terapis::class, 'therapist_id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

}
