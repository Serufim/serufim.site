<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CouponAnaliticsController extends Controller
{
    public function index(){
       return view('admin.coupon_analitics.index');
    }
}
