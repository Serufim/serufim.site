<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $table = 'coupons';
    protected $guarded = [];
    public $timestamps = true;

    public function type(){
        return $this->belongsTo(CouponType::class);
    }
    public function copies()
    {
        return $this->hasMany(CouponCopy::class);
    }

}
