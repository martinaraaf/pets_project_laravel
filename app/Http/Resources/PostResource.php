<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'content' => $this->content,
            'image_url' => $this->getImageUrl(),
            'user' => $this->user->name,
            'created_at' => $this->created_at->toDateTimeString(),
            'comments' => CommentResource::collection($this->whenLoaded('comments')),
        ];
    }

    private function getImageUrl()
    {
        // Assuming 'image' is the column in your 'posts' table
        $imagePath = $this->image;

        if ($imagePath) {
            // Generate the URL based on the configured storage disk
            return asset('storage/' . $imagePath);
        }

        return null;
    }
}
