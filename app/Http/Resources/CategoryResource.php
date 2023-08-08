<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);

        return [
            'category' => [
                'id' => $this->id,
                'name' => $this->name,
                '_links' => [
                    // here self consider the current link mean link for current project
                    '_self' => url('api/categories/' . $this->id),
                ],
            ],
        ];
    }
}
