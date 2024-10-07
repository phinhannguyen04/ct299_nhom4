<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sanbay extends Model
{
    use HasFactory;

    protected $fillable = [
        'ten',
        'thanhpho'
    ];

    // một sân bay có nhiều chuyến bay
    public function chuyenbays ()
    {
        return $this->hasMany(Chuyenbay::class);
    }

}
