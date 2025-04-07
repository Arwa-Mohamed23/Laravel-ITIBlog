<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
class PostController extends Controller
{
    public function index(){
        //$posts = Post::all();
        $posts = Post::paginate(15);

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

    public function store(){
        // dd($_POST);

        //dd(request()->all());

        $title = request()->title;
        $description = request()->description;
        $postCreator = request()->post_creator;

        //dd($postCreator);

        Post::create([
            'title' => $title,
            'description' => $description,
            'user_id' => $postCreator,
        ]);

        return to_route('posts.index');
    }

    public function edit(Post $post){
        $users = User::all();
        return view('posts.edit',['users' => $users, 'post' => $post]);
    }

    public function update($postId){

        $title = request()->title;
        $description = request()->description;
        $postCreator = request()->post_creator;

        $singlePostFromDB = Post::find($postId);
        $singlePostFromDB->update([
            'title' => $title,
            'description' => $description,
            'user_id' => $postCreator,
        ]);
        return to_route('posts.show', $postId);
    }

    public function destroy($postId)
    {
        $post = Post::find($postId);
        $post->delete();
        return to_route('posts.index');
    }
}
