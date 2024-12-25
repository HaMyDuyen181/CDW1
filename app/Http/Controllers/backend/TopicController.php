<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topic;
class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Lấy danh sách các chủ đề, có thể lọc theo trạng thái
        $query = Topic::query();

        // Lọc theo trạng thái nếu có
        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        // Lọc theo từ khóa trong tên hoặc mô tả chủ đề
        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
        }

        // Sắp xếp chủ đề theo thứ tự đã chỉ định
        $topics = $query->orderBy('sort_order')->paginate(10); // Phân trang 10 chủ đề mỗi trang

        // Trả về view với danh sách chủ đề
        return view('backend.topic.index', compact('topics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function trash()
    {
        return view('backend.topic.trash');
    }
    public function create()
    {
        return view('backend.topic.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return view('backend.topic.store');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $topic = Topic::find($id);
        if (!$topic) {
            return redirect()->route('topic.index')->with('error', 'topic không tồn tại.');
        }

        return view('backend.topic.show', compact('topic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('backend.topic.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return view('backend.topic.update');    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        return view('backend.topic.delete');    
    }
    public function restore(string $id)
    {
        return view('backend.topic.restore');    
    }
    public function destroy(string $id)
    {
        return view('backend.topic.destroy');    
    }
    public function status(string $id)
    {
        return view('backend.topic.status');    
    }
}
