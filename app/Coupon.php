<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coupon extends Model
{
    use SoftDeletes;

    protected $table = 'coupons';
    protected $guarded = [];
    public $timestamps = true;
    protected $dates = ['deleted_at'];

    public function type(){
        return $this->belongsTo(CouponType::class);
    }
    public function copies()
    {
        return $this->hasMany(CouponCopy::class);
    }

}
