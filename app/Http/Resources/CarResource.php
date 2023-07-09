<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'number' => $this->number,
            'color' => $this->color,
            'vin_code' => $this->vin_code,
            'mark' => $this->mark,
            'model' => $this->model,
            'year' => $this->year,
        ];
    }
}
