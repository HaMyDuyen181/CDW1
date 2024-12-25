<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Lấy danh sách các bài viết, có thể lọc theo topic_id và trạng thái
        $query = Post::query();

        // Lọc theo topic_id nếu có
        if ($request->has('topic_id')) {
            $query->where('topic_id', $request->topic_id);
        }

        // Lọc theo trạng thái nếu có
        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        // Lọc theo từ khóa trong tiêu đề hoặc nội dung bài viết
        if ($request->has('search')) {
            $query->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('content', 'like', '%' . $request->search . '%');
        }

        // Sắp xếp bài viết theo ngày tạo giảm dần
        $posts = $query->orderBy('created_at', 'desc')->paginate(10); // Phân trang 10 bài viết mỗi trang

        // Trả về view với danh sách bài viết
        return view('backend.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function trash()
    {
        return view('backend.post.trash');
    }
    public function create()
    {
        return view('backend.post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return view('backend.post.store');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $post = Post::find($id);
        if (!$post) {
            return redirect()->route('post.index')->with('error', 'post không tồn tại.');
        }

        return view('backend.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('backend.post.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return view('backend.post.update');    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        return view('backend.post.delete');    
    }
    public function restore(string $id)
    {
        return view('backend.post.restore');    
    }
    public function destroy(string $id)
    {
        return view('backend.post.destroy');    
    }
    public function status(string $id)
    {
        return view('backend.post.status');    
    }
}
