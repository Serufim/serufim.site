<?php

namespace App\Http\Controllers\Api;

use App\CouponCopy;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\CouponCopiesResource;

class CouponCopiesController extends Controller
{
    public function index()
    {
        return CouponCopiesResource::collection(CouponCopy::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'coupon_id' => 'required|integer',
        ]);
        $project = new CouponCopy($validatedData);
        $project->save();
        return ['status'=>'success'];
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
