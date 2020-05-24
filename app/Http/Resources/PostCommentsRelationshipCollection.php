<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PostCommentsRelationshipCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // $this->collection porque PostCommentsRelationshipCollection es un recurso de tipo collection
        return [
            "data" => CommentIdentifierResource::collection($this->collection),
            "links" => [
                "self" => '',
                "realted" => ''
            ]
        ];
    }
}
