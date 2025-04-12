<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index(){
        //$posts = Post::all();
        $posts = Post::with('user')->paginate(15);

        return view('posts.index',compact('posts'));
    }

    public function show(Post $post){
        
        //$post = Post::findOrFail($id);
        $users = User::all(); 
        return view('posts.show',['post' => $post, 'users' => $users]);
    }

    public function create(){

        $users = User::all();
        return view('posts.create', ['users' => $users]);
    } 

    public function store(storePostRequest $request){
        // dd($_POST);

        //dd(request()->all());
        $validated = $request->validated();

        // $title = request()->title;
        // $description = request()->description;
        // $postCreator = request()->post_creator;

        //dd($postCreator);

        $data = [
            'title' => $validated['title'],
            'description' => $validated['description'],
            'user_id' => $validated['post_creator'],
        ];
        
        // Handle image upload
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('post-images', 'public');
        }

        Post::create($data);

        return to_route('posts.index');
    }

    public function edit(Post $post){
        $users = User::all();
        return view('posts.edit',['users' => $users, 'post' => $post]);
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        $validated = $request->validated();
        
        $data = [
            'title' => $validated['title'],
            'description' => $validated['description'],
            'user_id' => $validated['post_creator'],
        ];
        
        if ($request->hasFile('image')) {
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
            
            $data['image'] = $request->file('image')->store('post-images', 'public');
        }

        $post->update($data);
        
        return to_route('posts.show', $post);
    }

    public function destroy($postId){
        $post = Post::find($postId);
        //dd($post->comments());
        //$post->comments()->delete();
        $post->delete();
        return to_route('posts.index');
    }
}
