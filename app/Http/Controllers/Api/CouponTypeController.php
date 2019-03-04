<?php

namespace App\Http\Controllers\Api;

use App\CouponType;
use App\Http\Resources\CouponTypeResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CouponTypeController extends Controller
{
    public function index()
    {
        return CouponTypeResource::collection(CouponType::all());
    }
}
