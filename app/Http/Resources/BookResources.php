<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'books_title' => $this->books_title,
            'author' => $this->author,
            'image' => $this->image,
            'price' => number_format($this->price / 100, decimals:2),
            'description' => substr($this->description, 0, 50) . '...',
            
        ];
        
    }
}
