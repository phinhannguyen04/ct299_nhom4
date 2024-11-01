<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    use HasFactory;

    protected $primaryKey = 'code';
    protected $table = 'passengers';

    protected $fillable = [
        'code',
        'name',
        'email',
        'cccd',
        'sdt',
        'diachi'
    ];


    public function vemaybays ()
    {
        return $this->hasMany(Vemaybay::class);
    }
}
