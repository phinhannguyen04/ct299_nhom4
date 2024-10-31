<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Chuyenbay extends Model
{
    use HasFactory;

    protected $table = 'chuyenbay';

    protected $fillable = [
        'machuyenbay',
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
    /*
        một chuyến bay từ 1 sân
    */ 
    public function sanbayXuatphat ()
    {
        return $this->belongsTo(Sanbay::class, 'xuatphat', 'id');
    }
    /*
        một chuyến bay đến 1 sân bay khác
    */ 
    public function sanbayDiemden ()
    {
        return $this->belongsTo(Sanbay::class, 'diemden', 'id');
    }

    /*
        một chuyến bay thì có nhiều vé máy bay
    */
    public function vemaybay ()
    {
        return $this->hasMany(Vemaybay::class);
    }

    protected static function booted()
    {
        static::creating(function ($chuyenbay)
        {
            /*
                Tạo mã chuyến bay tự động
            */
            $ky_tu = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

            $chuyenbay->machuyenbay = 'KKND' . Carbon::now()->day . 'VN' . substr(str_shuffle($ky_tu), 0, 2) . mt_rand(100,999) . Carbon::now()->year%2000;

        });

        /*
            Tạo vé tự động
        */
        static::created(function ($chuyenbay) {
            /*
                Khi một chuyến bay mới được tạo, thực hiện logic này
            */ 
            $chuyenbay->createVes();
        });
    }

    public function createVes()
    {
        $soluongve = $this->succhua; // Giả sử succhua có giá trị từ form

        // Các giá trị vé
        $giaEconomy = $this->giaghephothong;
        $giaBusiness = $this->giaghethuonggia;

        // Tính toán số lượng vé Business và Economy
        $soLuongVeThuongGia = intval($soluongve) * 0.1;
        $soLuongVeThuong = $soluongve - $soLuongVeThuongGia;

        /*
            Tạo vé máy bay tự động
        */

        $ky_tu = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $so = '0123456789';

        // Tạo vé Economy
        for ($i = 1; $i <= $soLuongVeThuong; $i++) {
            $chongoi_id = Chongoi::inRandomOrder()->first()->id;
            $ngaymua = Carbon::now();

            Vemaybay::create([
                'mavemaybay' => 'a' . substr(str_shuffle($ky_tu), 0, 4) .'-'. substr(str_shuffle($ky_tu), 0, 5) . substr(str_shuffle($so), 0, 4),
                'chuyenbay_id' => $this->id,
                'chongoi_id' => $chongoi_id,
                'user_id' => 1,
                'ngaymua' => $ngaymua,
                'loaive' => 'Economy',
                'khoiluong' => 7,
                'gia' => $giaEconomy,
            ]);
        }

        /*
             Tạo vé Business
        */

        for ($i = 1; $i <= $soLuongVeThuongGia; $i++) {
            $chongoi_id = Chongoi::inRandomOrder()->first()->id;
            $ngaymua = Carbon::now();

            Vemaybay::create([
                'mavemaybay' => 'b' . substr(str_shuffle($ky_tu), 0, 4) .'-'. substr(str_shuffle($ky_tu), 0, 5) . substr(str_shuffle($so), 0, 4) . Carbon::now()->day,
                'chuyenbay_id' => $this->id,
                'chongoi_id' => $chongoi_id,
                'user_id' => 1,
                'ngaymua' => $ngaymua,
                'loaive' => 'Business',
                'khoiluong' => 7,
                'gia' => $giaBusiness,
            ]);
        }
    }
}
