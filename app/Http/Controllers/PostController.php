<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = [
            ['id' => 1 , 'title' => 'First Post', 'posted_by' => 'Ahmed', 'created_at' => '2025-11-10 10:00:00'],
            ['id' => 2 , 'title' => 'Second Post','posted_by' => 'Mohamed', 'created_at' => '2025-11-10 10:00:00'],
            ['id' =>3 , 'title' => 'Third Post','posted_by' => 'Mohamed', 'created_at' => '2025-11-10 10:00:00'],
        ];

        return view('posts.index',compact('posts'));
    }

    public function show(){
        $post = [
            'title' => 'Hello Post',
            'description' => 'this is some post',
            'user' => [
                'name' => 'Ahmed',
                'email' => 'ahmed@gmail.com',
                'created_at' => '2024-10-01 10:00:00'
            ]
        ];

        return view('posts.show',[
            'post' => $post
        ]);
    }

    public function create(){
        return view('posts.create');
    } 

    public function store(Request $request){
        // dd($_POST);

        //dd(request()->all());

        //dd(request()->title);

        //dd($request->all());

        return to_route('posts.index');
    }

    public function edit($postId){
        $post = [
            'id' => $postId,
            'title' => 'Sample Post',
            'description' => 'Sample description',
            'posted_by' => 'Ahmed'
        ];

        return view('posts.edit',[
            'post' => $post
        ]);
    }

    public function update(Request $request, $postId){
        $data = $request->all();
        $data['id'] = $postId;
        //dd($data);

        return to_route('posts.index');
    }
}
