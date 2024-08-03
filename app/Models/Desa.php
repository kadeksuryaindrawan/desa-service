<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'desa',
        'alamat',
        'telp'
    ];

    public function data()
    {
        return $this->hasMany(PotensiPermasalahan::class);
    }
}
