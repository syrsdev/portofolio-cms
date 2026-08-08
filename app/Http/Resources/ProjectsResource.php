<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectsResource extends JsonResource
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
            'image' => $this->image,
            'title' => $this->title,
            'description' => $this->description,
            'link' => $this->link,
            'github_link' => $this->github_link,
            'figma_link' => $this->figma_link,
            'slug' => $this->slug,
            'skills' => $this->projectSkills
        ];
    }
}
