<?php

namespace App\Http\Resources;

use App\Coupon;
use Illuminate\Http\Resources\Json\JsonResource;

class CouponCopiesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $resource = $this->resource;
        return [
            'id'=>$resource->id,
            'time'=>$resource->created_at,
            'coupon'=>new CouponResource($resource->coupon),
        ];
    }
}
