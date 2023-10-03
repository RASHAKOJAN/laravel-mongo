<?php


namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        Post::create($request->all());

        return response()->json(["result" => "ok"], 201);
    }

    public function destroy($postId){
        $post = Post::find($postId);
        $post->delete();

        return response()->json(["result" => "ok"], 200);
    }

    public function update(Request $request, $postId){
        $post = Post::find($postId);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->slug = $request->slug;

        return response()->json(["result" => "ok"], 201);

    }

}
