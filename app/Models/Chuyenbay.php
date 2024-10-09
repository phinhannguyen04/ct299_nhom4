<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chuyenbay extends Model
{
    use HasFactory;

    protected $table = 'chuyenbay';

    protected $fillable = [
        'xuatphat',
        'diemden',
        'ngaybay',
        'ngayden',
        'giobay',
        'gioden',
        'succhua',
        'tenmaybay',
        'giaghephothong',
        'giaghethuonggia'
    ];

    // một chuyến bay từ 1 sân
    public function sanbayXuatPhat ()
    {
        return $this->belongsTo(Sanbay::class, 'xuatphat');
    }

    // một chuyến bay đến 1 sân bay khác
    public function sanbayDiemDen ()
    {
        return $this->belongsTo(Sanbay::class, 'diemden');
    }

    // một chuyến bay thì có nhiều vé máy bay
    public function vemaybays ()
    {
        return $this->hasMany(Vemaybay::class);
    }
}
