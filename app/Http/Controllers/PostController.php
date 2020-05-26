<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostCollection;
use Illuminate\Http\Request as PostResource;
use App\Post;

class PostController extends Controller
{
    public function index()
    {
        return new PostCollection(request()->user()->posts);
    }

    public function store()
    {
        $data = request()->validate([
            'data.attributes.body' => '',
        ]);

        $post = request()->user()->create($data['data']['attributes']);

        return new PostResource($post);
    }
}
