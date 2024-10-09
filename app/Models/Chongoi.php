<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chongoi extends Model
{
    use HasFactory;

    protected $table = 'chongoi';

    protected $fillable = [
        'vitri'
    ];

    // chỗ ngồi thuộc về cái vé đó
    public function vemaybay ()
    {
        return $this->belongsTo(Vemaybay::class);
    }
}
