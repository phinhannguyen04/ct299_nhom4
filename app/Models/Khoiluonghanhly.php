<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Khoiluonghanhly extends Model
{
    use HasFactory;

    protected $fillable = [
        'khoiluong',
        'gia'
    ];

    public function chitietthanhtien ()
    {
        return $this->belongsTo(Chitietthanhtien::class);
    }
}
