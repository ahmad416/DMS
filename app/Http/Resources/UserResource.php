<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\DesiginationResource;
use App\Http\Resources\DepartmentResource;
class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'firstName' => $this->firstName,
            'lastName' => $this-> lastName,
            'userId' => $this->userId,
            'avatar' => $this->src,
            'desigination' => new DesiginationResource($this->desigination),
            'department' => new DepartmentResource($this)



        ];
    }
}
