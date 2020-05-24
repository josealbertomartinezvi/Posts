<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Auth;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $user = Auth::user();

        return [
            'type' => $this->getTable(),
            'id' => $this->id,
            'attributes' => [
                'title' => $this->title
            ],

            // Validar campos que solo un administrador puede ver
            $this->mergeWhen($user->isAdmin(), [
                'created' => $this->created_at
            ]),

            "links" => [
                "self" => route('posts.show', ['post' => $this->id])
            ],
            "relationships" => new PostRelationshipResource($this)
        ];
    }
}
