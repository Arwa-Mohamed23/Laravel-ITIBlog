<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;  
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $postId)
    {
        $post = Post::findOrFail($postId);
        
        $comment = new Comment([
            'content' => $request->content,
            'user_id' => $request->user_id  
        ]);
        
        $post->comments()->save($comment);
        
        return redirect()->route('posts.show', $post->id);
    }
    
    public function edit($postId, $commentId)
    {
        $post = Post::findOrFail($postId);
        $comment = Comment::findOrFail($commentId);
        $users = User::all(); 
        
        return view('comments.edit', compact('post', 'comment', 'users'));
    }
    
    public function update(Request $request, $postId, $commentId)
    {
        $comment = Comment::findOrFail($commentId);
        $comment->update([
            'content' => $request->content,
            'user_id' => $request->user_id 
        ]);
        
        return redirect()->route('posts.show', $postId);
    }
    
    public function destroy($postId, $commentId)
    {
        $comment = Comment::findOrFail($commentId);
        $comment->delete();
        
        return redirect()->route('posts.show', $postId);
    }
}