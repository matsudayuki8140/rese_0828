<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','shop_id','date','time','number'];
    protected $dates = [
        'time',
    ];

    public function shop() {
        return $this->belongsTo(Shop::class, 'shop_id', 'id');
    }
}