<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CouponResource extends JsonResource
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
            'code'=>$resource->code,
            'price'=>$resource->price,
            'actual_price'=>$resource->actual_price,
            'extra'=>$resource->extra,
            'description'=>$resource->description,
            'type'=>$resource->type,
        ];
    }
}
