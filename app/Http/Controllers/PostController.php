<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id', 'DESC')->get();

        return view('posts/index', [
            'posts' => $posts
        ]);
    }

    public function update(Request $request, $id){
        $data = $request->validate([
            'title' => 'required|string|max:100',
            'body' =>'required|string',    
        ]);
        $posts =Post::findOrFail($id)->update($data);
        return response()->json($id);
    }

       public function store(Request $request){
        $data = $request->validate([
            'title' => 'required|string|max:100',
            'body' =>'required|string',    
        ]);
        $posts =Post::create($data);
        return response()->json($post);
    }

        public function destroy($id){
      
        Post::findOrFail($id);
        return response()->json($id);
    }

}
