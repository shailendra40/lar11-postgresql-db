<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        Post::create($request->all());
        return redirect()->route('posts.index');
    }

    public function show($id) // Use $id as parameter
    {
        $post = Post::findOrFail($id); // Fetch post by $id
        return view('posts.show', compact('post'));
    }

    public function edit($id) // Use $id as parameter
    {
        $post = Post::findOrFail($id); // Fetch post by $id
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id) // Use $id as parameter
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $post = Post::findOrFail($id); // Fetch post by $id
        $post->update($request->all());
        return redirect()->route('posts.index');
    }

    public function destroy($id) // Use $id as parameter
    {
        $post = Post::findOrFail($id); // Fetch post by $id
        $post->delete();
        return redirect()->route('posts.index');
    }
}
?>
