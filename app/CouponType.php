<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CouponType extends Model
{
    protected $table = 'coupon_types';
    protected $guarded = [];
    public $timestamps = false;

    public function coupons()
    {
        return $this->hasMany(Coupon::class);
    }
}
