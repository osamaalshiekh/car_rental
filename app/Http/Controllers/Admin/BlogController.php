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
            'bcontent' => $request->input('bcontent'),
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
        $blog=Blog::find($id);
        $blog->title = $request->title;
        if ($request->file('image')) {
            $blog->image = $request->file('image')->store('images/blogs', 'public');
        }
        $blog->m_title = $request->m_title;
        $blog->bcontent = $request->bcontent;
        $blog->m_content = $request->m_content;
        $blog->keyword = $request->keyword;
        $blog->save();
        return redirect('admin/blog');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blog::find($id);
        if (!$blog) {
            return redirect()->route('admin.blog.index')->with('error', 'Blog not found');
        }

        if ($blog->delete()) {
            // Redirect with success message if delete was successful
            return redirect()->route('admin.blog.index')->with('success', 'Blog deleted successfully');
        } else {
            // Redirect with error message if delete failed
            return redirect()->route('admin.blog.index')->with('error', 'Failed to delete the blog');
        }
    }
}
