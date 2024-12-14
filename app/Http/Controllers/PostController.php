<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view("home", compact("posts"));

    }

    /**
     * Show the form for creating a new resource.
     */
    // form thêm 
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    // controller thêm 
    public function store(Request $request)
    {
        Post::create($request->all());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */

     // hiển thị 1 cái 
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    // form sửa 
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    // controller sửa 
    public function update(Request $request, string $id)
    {
        Post::findOrFail($id)->update($request->all());
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    // xóa 
    public function destroy(string $id)
    {
        // Xử lý xóa bài viết
        $post = Post::findOrFail($id);
        $post->delete();

        // Chuyển hướng hoặc trả về thông báo
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
    }

