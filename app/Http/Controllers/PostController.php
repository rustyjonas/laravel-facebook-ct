<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store()
    {
        $data = request()->validate([
            'data.attributes.body' => '',
        ]);

        $post = request()->user()->create($data['data']['attributes']);


        return response([
            'data' => [
                'type' => 'posts',
                'post_id' => $post->id,
                'attributes' => [
                    'body' => 'Testing Body',
                ]
            ],
            'links' => [
                'self' => url('/posts/'. $post->id),
            ]
        ], 201);
    }
}
