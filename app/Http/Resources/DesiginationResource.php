<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DesiginationResource extends JsonResource
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
            'desigination' => $this->desiginationName,
            'desigination-order'=> $this->desiginationOrder,
            'description' => $this->desc
        ];
    }
}
