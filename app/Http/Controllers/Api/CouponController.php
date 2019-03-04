<?php

namespace App\Http\Controllers\Api;

use App\Coupon;
use App\Http\Controllers\Controller;
use App\Http\Resources\CouponResource;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return CouponResource
     */
    public function index()
    {
        return CouponResource::collection(Coupon::all());
    }
}
