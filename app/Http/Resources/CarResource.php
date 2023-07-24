<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Mark;
use App\Models\MarkModel;

class CarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $mark = Mark::where('api_id', $this->mark_api_id)->first();
        $model = MarkModel::where('api_id', $this->model_api_id)->first();

        return [
            'id' => $this->id,
            'name' => $this->name,
            'number' => $this->number,
            'color' => $this->color,
            'vin_code' => $this->vin_code,
            'mark' => $mark->name ?? '',
            'model' => $model->name ?? '',
            'year' => $this->year,
        ];
    }
}
