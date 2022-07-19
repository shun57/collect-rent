<?php

namespace App\Http\Resources\Lent;

use Illuminate\Http\Resources\Json\JsonResource;

class LentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request): array
    {
        return [
            'id'   => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'lend_money' => $this->lend_money,
            'interval' => $this->interval,
        ];
    }
}
