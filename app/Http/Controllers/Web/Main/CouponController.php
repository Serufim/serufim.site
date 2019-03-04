<?php

namespace App\Http\Controllers\Web\Main;

use App\Coupon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('main.coupons',["coupons"=>Coupon::all()]);
    }
}
