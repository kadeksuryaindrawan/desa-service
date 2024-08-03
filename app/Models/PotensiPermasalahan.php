<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PotensiPermasalahan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_desa',
        'potensi',
        'permasalahan',
        'status'
    ];

    public function desa()
    {
        return $this->belongsTo(Desa::class, 'id_desa');
    }
}
