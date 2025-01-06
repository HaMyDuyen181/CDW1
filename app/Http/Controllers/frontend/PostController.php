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
        $list_post = Post::where('status', '=', 1)
        ->orderBy('created_at', 'desc')
        ->paginate(2);
        return view("frontend.post", compact('list_post'));
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
        $listtopicid = $this->getlisttopicid(($post->topic_id));
        $list_post= Post::where([['status', '=', 1],['id','!=',$post->id]])
            ->whereIn('topic_id', $listtopicid)
            ->paginate(4);
        return view("frontend.post_detail", compact('post','list_post'));

    }

}