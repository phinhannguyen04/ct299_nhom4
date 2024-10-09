<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vemaybay extends Model
{
    use HasFactory;

    protected $table = 'vemaybay';

    protected $fillable = [
        'chuyenbay_id',
        'chongoi_id',
        'user_id',
        'ngaymua',
        'loaive',
        'khoiluong',
        'gia'
    ];

    // một vé máy bay ứng với một chuyến bay
    public function chuyenbay ()
    {
        return $this->belongsTo(Chuyenbay::class);
    }

    // một vé máy bay ứng với một chỗ ngồi
    public function chongoi ()
    {
        return $this->hasOne(Chongoi::class);
    }

    // mỗi người có thể mua được nhiều vé
    public function user ()
    {
        return $this->belongsTo(User::class);
    }

    // tinh tien cac ve may bay thong qua bang chitietthanhtoan
    public function chitiethanhtien ()
    {
        return $this->belongsTo(Chitietthanhtien::class);
    }
}
