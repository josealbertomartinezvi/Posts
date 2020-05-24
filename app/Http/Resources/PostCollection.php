<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PostCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "data" => PostResource::collection($this->collection)
        ];
    }

    /**
     * Add resources into toArray.
     *
     * @param $request
     * @return array
     */
    public function with($request){

        $users = $this->collection->map(function($post){
            return $post->user;
        });

        return [
            'links' => [
                'self' => route('posts.index')
            ],
            'include' => $users->map(function($user){
                return new UserResource($user);
            })
        ];

    }
}
