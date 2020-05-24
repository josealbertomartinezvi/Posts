<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

use App\User;
use App\Models\Comment;

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

        $comments = $this->collection->flatMap(function($post){
            return $post->comments;
        });

        $include = $users->merge($comments);

        return [
            'links' => [
                'self' => route('posts.index')
            ],
            'include' => $include->map(function($item){
                if($item instanceof User)
                    return new UserResource($item);
                else if($item instanceof Comment)
                    return new CommentResource($item);
            })
        ];

    }
}
