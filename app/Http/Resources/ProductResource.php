<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     * 
     *  
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'brand_id' => $this->brand_id,
            'priority' => $this->priority,
            'name' => $this->name,
            'code' => $this->code,
            'condition' => $this->condition,
            'source' => $this->source,
            'price' => $this->price,
            'short_description' => $this->short_description,
            'description' => $this->description,
            'user' => new UserResource($this->whenLoaded('user')),
            'brand' => new BrandResource($this->whenLoaded('brand')),
            'categories' => CategoryResource::collection($this->whenLoaded('categories')),
            'product_images' => ProductImageResource::collection($this->whenLoaded('product_images')),
            'created_at' => $this->created_at->format('d M Y H:i a'),
            'updated_at' => $this->updated_at->format('YmdHi'),

        ];
    }
}
