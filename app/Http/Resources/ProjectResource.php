<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);

        // here this refer on Project Model and not this class
        return [
            'id' => $this->id,
            'title' => $this->title,
            'category' => new CategoryResource($this->category),
            'description' => $this->description,
            'update_time' => $this->updated_at,
            'status' => $this->status,

            // here use this way if I need pass collection to resource
            'tags' => TagResource::collection($this->tags),
            '_links' => [
                // here self consider the current link mean link for current project
                '_self' => url('api/projects/' . $this->id),
            ],
        ];
    }
}
