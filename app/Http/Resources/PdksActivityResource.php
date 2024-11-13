<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PdksActivityResource extends JsonResource
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
            'morning_entrance' => $this->morning_entrance,
            'morning_exit' => $this->morning_exit,
            'noon_entrance' => $this->noon_entrance,
            'noon_exit' => $this->noon_exit,
            'employee' => $this->employee,
            'shiftDay' => $this->shiftDay,
            'externals' => $this->external,
            'last_external' => $this->last_external,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
