<?php

namespace App\Http\Controllers;

use App\AdvancedSearch;
use App\Post;
use App\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdvancedSearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(String $text = '')
    {
        $posts = DB::table('posts')
            ->where('status', '=', 'PUBLISHED')
            ->where('body', 'LIKE', '%' . $text . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        $search = new AdvancedSearch();
        $search->term = $text;
        return view('advancedsearch', ['data' => $posts, 'search' => $search]);


    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = DB::table('posts')
            ->where('status', '=', 'PUBLISHED')
            ->where('body', 'LIKE', '%' . $id . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        $search = new AdvancedSearch();
        $search->term = $id;
        $search->status = 'PUBLISHED';

        return view('advancedsearch', ['data' => $posts, 'search' => $search]);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $search = new AdvancedSearch();
        $search->term = $request->term;
        $search->category = $request->category;
        $search->status = $request->status;
        $search->time = $request->time;
//        dump(trim($search->term));
//        return;
        $posts = DB::table('posts');
//            ->where('status', '=', 'PUBLISHED')
//            ->where('body', 'LIKE', '%' . $id . '%')
//            ->orderBy('created_at', 'desc')
//            ->paginate(10);
        if (trim($search->term) == true) {
            $posts = $posts->where('body', 'LIKE', '%' . $search->term . '%');
//            $posts->orderBy('created_at', 'desc')
//                ->paginate(10);
//            dump($posts);

//            return view('advancedsearch', ['data' => $posts, 'search' => $search]);

        }
        if (trim($search->category) && $search->category != 0) {
            $posts = $posts->where('category_id', '=', $search->category);
        }
        if (trim($search->status)) {
            $posts = $posts->where('status', '=', $search->status);
        }
//
        if (trim($search->time) && $search->time !=0 ) {
            switch($search->time){
                case 1:
                    $lastweek = \Carbon\Carbon::now()->subWeek(1);
                    $posts =$posts->where('created_at', '>=', $lastweek);
                    break;
                case 2:
                    $lastmonth = \Carbon\Carbon::now()->subMonth();
                    $posts = $posts->where('created_at', '>=', $lastmonth);
                    break;
                case 3:
                    $last3month = \Carbon\Carbon::now()->subMonth(3);
                    $posts =$posts->where('created_at', '>=', $last3month);
                    break;
            }
        }
        $posts = $posts->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('advancedsearch', ['data' => $posts, 'search' => $search]);

        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
