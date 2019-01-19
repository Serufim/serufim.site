<?php

namespace App\Http\Controllers\Web\Admin;

use App\CouponType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CouponTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.coupon_types.list',['types'=>CouponType::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.coupon_types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //TODO:Так, ну валидация и все дела
        $validatedData = $request->validate([
            'name' => 'string|required|max:255',
        ]);
        $coupon= new CouponType($validatedData);
        $coupon->save();
        return redirect()->route('coupon_types.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CouponType $couponType)
    {
        return view('admin.coupon_types.edit',['type'=>$couponType]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CouponType $couponType)
    {
        //TODO:Так, ну валидация и все дела
        $validatedData = $request->validate([
            'name' => 'string|required|max:255',
        ]);
        $couponType->update($validatedData);
        return redirect()->route('coupon_types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CouponType $couponType)
    {
        $couponType->delete();
        return redirect()->route('coupon_types.index');
    }
}
