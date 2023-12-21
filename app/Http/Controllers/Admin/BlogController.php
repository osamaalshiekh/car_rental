<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blog = Blog::all();
        return view('admin.blog.index',compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Upload the featured image
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/blogs', 'public');
            $data['image'] = $imagePath;
        }

        // Create a new blog post
        Blog::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'm_title' => $request->input('m_title'),
            'm_content' => $request->input('m_content'),
            'keyword' => $request->input('keyword'),
            'image' => $data['image'] ?? null, // handle the case where 'image' may not exist
        ]);

        // Redirect back to the form with a success message
        return redirect()->route('admin.blog.index')->with('success', 'Blog post created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $blog = Blog::find($id);

        if (!$blog) {
            abort(404);
        }

        return view('admin.blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blog::find($id);
        if (!$blog) {
            abort(404);
        }
        $blog->delete();

        return view('admin.blog.index',compact('blog'));


    }
}
