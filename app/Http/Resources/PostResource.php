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
            'image' => $this->getImageUrl(),
            // 'user' => $this->user->name,
            'created_at' => $this->created_at->toDateTimeString(),
            'comments' => CommentResource::collection($this->whenLoaded('comments')),
        ];
    }

    private function getImageUrl()
    {
        // Assuming 'image' is the column in your 'posts' table
        $image= $this->image;
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $customFolder = 'posts_images';

        $image->move(public_path($customFolder), $imageName);
    
        $newFilePath = "{$customFolder}/{$imageName}";

        return $newFilePath;
    }
}
