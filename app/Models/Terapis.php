<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Terapis extends Model
{
    protected $table = 'terapis'; 
    protected $fillable = ['nama','jenis_kelamin','ponsel','email','status'];
}
