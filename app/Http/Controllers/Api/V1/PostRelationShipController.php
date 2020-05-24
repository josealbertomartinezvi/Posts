<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;
use App\Http\Resources\UserController;

use App\Http\Resources\UserResource;
use App\Http\Resources\CommentResource;

class PostRelationShipController extends Controller
{
    public function user(Post $post){

        return new UserResource($post->user);

    }

    public function comments(Post $post){

        return CommentResource::collection($post->comments);

    }
}
