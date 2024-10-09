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
    public function sanbayXuatphat ()
    {
        return $this->belongsTo(Sanbay::class, 'xuatphat', 'id');
    }

    // một chuyến bay đến 1 sân bay khác
    public function sanbayDiemden ()
    {
        return $this->belongsTo(Sanbay::class, 'diemden', 'id');
    }

    // một chuyến bay thì có nhiều vé máy bay
    public function vemaybay ()
    {
        return $this->hasMany(Vemaybay::class);
    }
}
