<?php

namespace App\Http\Resources;

use App\Models\Supply;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Supply */
class SupplyResource extends JsonResource
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
            'status' => $this->status,
            'supplier' => $this->supplier->name,
            'user' => $this->user->name,
            'created' => $this->created_at->diffForHumans(),
            'price' => $this->supplies->sum('price'),
            'products' => ProductResource::collection($this->products),
        ];
    }
}
