<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MyPostController extends Controller
{
    public function publicPost(Request $request)
    {

        $posts =  searchPost(Auth::id(), null, $request->search);

        return view('user.post-list', compact('posts'));
    }

    public function pendingPost(Request $request)
    {
        return searchPost(Auth::id(), 'PENDING', $request->search);
        return view('user.post-list');
    }

    public function closedPost(Request $request)
    {
        return searchPost(Auth::id(), 'CLOSED', $request->search);
        return view('user.post-list');
    }

    public function draftPost(Request $request)
    {
        return searchPost(Auth::id(), 'DRAFT', $request->search);
        return view('user.post-list');
    }

    public function favoritePost(Request $request)
    {
        $search = $request->search;

        $post = DB::table('posts')
            ->join('favorites', 'posts.id', '=', 'favorites.post_id')
            ->where('posts.status', 'PUBLISHED')
            ->where('favorites.user_id', Auth::id())
            ->when($search,
                function ($query, $search) {
                    return $query->where(function ($query) use($search) {
                        return $query->where('title', 'like', '%'.$search.'%')
                            ->orWhere('body', 'like', '%'.$search.'%');
                    }, $search);
                })
            ->select('posts.*');




        return $post->paginate(16)->appends(['search' => $search]);


        return view('user.post-list');
    }
}
