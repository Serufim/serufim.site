<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CouponCopy extends Model
{
    protected $table = 'coupon_copies';
    protected $guarded = [];
    public $timestamps = true;

    public function coupon(){
        return $this->belongsTo(Coupon::class);
    }
}
