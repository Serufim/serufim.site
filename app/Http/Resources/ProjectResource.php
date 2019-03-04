<?php

namespace App\Http\Resources;

use App\Project;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        /** @var Project $resource */
        $resource = $this->resource;
        return [
            'id'=>$resource->id,
            'name'=>$resource->name,
            'subtitle'=>$resource->subtitle,
            'description'=>$resource->description,
            'demo'=>$resource->demo,
            'created_time'=>$resource->created_time,
            'finished_time'=>$resource->finished_time,
            'current_version'=>$resource->current_version,
            'license'=>$resource->license,
        ];
    }
}
