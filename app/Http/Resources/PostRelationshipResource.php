<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostRelationshipResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "user" => [
                "links" => [
                    'self' => '',
                    'related' => ''
                ],
                "data" => new UserIdentifierResource($this->user)
            ],
            "comments" => new PostCommentsRelationshipCollection($this->comments)
        ];
    }
}
