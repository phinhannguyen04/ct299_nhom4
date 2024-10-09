<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chitietthanhtien extends Model
{
    use HasFactory;

    protected $table = 'chitietthanhtien';

    protected $fillable = [
        'khoiluonghanhly_id',
        'vemaybay_id',
        'thanhtien',
        'mota'
    ];

    // một chi tiết thanh toán có thể thanh toán cho nhiều vé máy bay
    public function vemaybays ()
    {
        return $this->hasMany(Vemaybay::class);
    }
    // và các khối lượng đi kèm tương ứng
    public function khoiluonghanhlys ()
    {
        return $this->hasMany(Khoiluonghanhly::class);
    }
}
