<?php

namespace App\Http\Controllers\Web\Admin;

use App\CouponType;
use Illuminate\Http\Request;
use App\Coupon;
use App\Http\Controllers\Controller;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.coupons.list',["coupons"=>Coupon::paginate(20)]);
    }

    public function trashed_index()
    {
        return view('admin.coupons.trashed',["coupons"=>Coupon::onlyTrashed()->paginate(20)]);
    }

    public function restore($id)
    {
        Coupon::withTrashed()->find($id)->restore();
        return redirect()->route('coupons.index');
    }

    public function force($id)
    {
        Coupon::withTrashed()->find($id)->forceDelete();
        return redirect()->route('coupons.trashed');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.coupons.create',['types'=>CouponType::all()]);
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
            'code' => 'string|required|max:255',
            'description' => 'string|required',
            'price' => 'integer|nullable',
            'type_id' => 'integer|required',
            'actual_price' => 'integer|nullable',
            'extra' => 'string|nullable',
        ]);
        $coupon = new Coupon($validatedData);
        $coupon->save();
        return redirect()->route('coupons.index');
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
    public function edit(Coupon $coupon)
    {
        return view('admin.coupons.edit',['coupon'=>$coupon,'types'=>CouponType::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coupon $coupon)
    {
        //TODO:Так, ну валидация и все дела
        $validatedData = $request->validate([
            'code' => 'string|required|max:255',
            'description' => 'string|required',
            'price' => 'integer|nullable',
            'type_id' => 'integer|required',
            'actual_price' => 'integer|nullable',
            'extra' => 'string|nullable',
        ]);
        $coupon->update($validatedData);
        return redirect()->route('coupons.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        return redirect()->route('coupons.index');
    }
}
