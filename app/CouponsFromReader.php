<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CouponsFromReader extends Model
{
    protected $fillable=[
        'message'
    ];
    protected $table = 'coupons_from_readers';
    protected $guarded = [];
    public $timestamps = false;

}
