<?php

namespace App\Http\Controllers;

use App\Http\Resources\Post;
use Illuminate\Http\Request as PostResource;

class PostController extends Controller
{
    public function store()
    {
        $data = request()->validate([
            'data.attributes.body' => '',
        ]);

        $post = request()->user()->create($data['data']['attributes']);

        return new PostResource($post);
    }
}
