<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Topic;

class PostController extends Controller
{
    public function index()
{
    $post_list = Post::where('status', 1) // Lấy bài viết có status = 1
        ->orderBy('created_at', 'desc')  // Sắp xếp theo ngày tạo, bài viết mới nhất trước
        ->take(2)                        // Lấy 2 bài viết đầu tiên
        ->get();                         // Trả về dưới dạng collection
    return view("frontend.post-new", compact('post_list'));
}


    public function getlisttopicid($rowid)
    {
        $listtopicid = [];
        array_push($listtopicid, $rowid);
        $list1 = Topic::where([['sort_order','=',$rowid], ['status', '=', 1]])->select('id')->get();
        if (count($list1) > 0) {
            foreach ($list1 as $row1) {
                array_push($listtopicid, $row1->id);
                $list2 = Topic::where([['sort_order','=',$rowid],['status', '=', 1]])->select('id')->get();
                if (count($list2) > 0) {
                    foreach ($list2 as $row2) {
                        array_push($listtopicid, $row2->id);
                    }
                }
            }
        }
        return $listtopicid;
    }

    public function topic($slug)
    {
        $row_topic = Topic::where([["slug", "=", $slug], ['status', '=', 1]])->select('id', 'name', 'slug')->first();
        $listtopic = [];
        if ($row_topic != null) {
            $listtopic = $this->getlisttopicid(($row_topic->id));
        }
        $list_post = Post::where('status', '=', 1)
            ->whereIn('topic_id', $listtopic)
            ->orderBy('created_at', 'desc')
            ->paginate(1);
        return view("frontend.post_topic", compact("list_post", 'row_topic'));
    }

    public function post_detail($slug)
    {
        $post = Post::where([['status', '=', 1], ['slug', '=', $slug]])->first();
        $listtopicid = $this->getlisttopicid($post->topic_id);
    
        // Get the list of related posts based on the topic
        $relatedPosts = Post::where([['status', '=', 1], ['id', '!=', $post->id]])
            ->whereIn('topic_id', $listtopicid)
            ->paginate(2);
    
        return view("frontend.post_detail", compact('post', 'relatedPosts'));
    }
    

}