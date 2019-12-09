<?php

namespace App\Http\Controllers\User;

use App\Charts\UserChart;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class UserDashboardController extends Controller
{
    public function index(Request $request)
    {
        $year = date("Y");
        if(isset($request->year)){
            $year =$request->year;
        };

        $historyYear= DB::table('posts')
            ->where('author_id', Auth::id(), true)
            ->select(DB::raw('YEAR(created_at) year'))
            ->distinct()
            ->get();

        $totalPosts = Post::where('author_id', Auth::id(), true )
            ->where(DB::raw('YEAR(created_at)'), $year)->count();

        $totalViews = DB::table('posts')
            ->join('post_views', 'post_views.post_id', '=', 'posts.id')
            ->where('posts.author_id', Auth::id(), true)
            ->whereYear('post_views.created_at', $year)
            ->select('post_views.id')
            ->count();

        $totalRatings = DB::table('posts')
            ->join('ratings', 'ratings.post_id', '=', 'posts.id')
            ->where('posts.author_id', Auth::id(), true)
            ->whereYear('ratings.created_at', $year)
            ->select('ratings.id')
            ->count();

        $totalComments = DB::table('posts')
            ->join('comments', 'comments.post_id', '=', 'posts.id')
            ->where('posts.author_id', Auth::id(), true)
            ->whereYear('comments.created_at', $year)
            ->select('comments.id')
            ->count();


        $monthlyPost= DB::table('posts')
            ->where('author_id', Auth::id(), true)
            ->whereYear('created_at', $year)
            ->select(DB::raw('count(id) as `data`'),  DB::raw( 'MONTH(created_at) month'))
            ->groupby('month')
            ->get();

        $monthly_post = new UserChart();
        $monthly_post->title('Monthly Post');
        $monthly_post->labels(["January", "February", "March", "April", "May", "June", "July","August","September","October","November","December"]);
        $monthly_post->dataset('Posts', 'bar', UserChart::monthlyDataPrepare($monthlyPost))->backgroundColor("rgba(105, 0, 132, 0.2)")->color('rgba(200, 99, 132, 0.7)');

        $monthlyViews= DB::table('posts')
            ->join('post_views', 'post_views.post_id', '=', 'posts.id')
            ->where('posts.author_id', Auth::id(), true)
            ->whereYear('post_views.created_at', $year)
            ->select(DB::raw('count(post_views.id) as `data`'),  DB::raw( 'MONTH(post_views.created_at) month'))
            ->groupby('month')
            ->get();

        $monthlyRatings= DB::table('posts')
            ->join('ratings', 'ratings.post_id', '=', 'posts.id')
            ->where('posts.author_id', Auth::id(), true)
            ->whereYear('ratings.created_at', $year)
            ->select(DB::raw('count(ratings.id) as `data`'),  DB::raw( 'MONTH(ratings.created_at) month'))
            ->groupby('month')
            ->get();

        $monthlyComments= DB::table('posts')
            ->join('comments', 'comments.post_id', '=', 'posts.id')
            ->where('posts.author_id', Auth::id(), true)
            ->whereYear('comments.created_at', $year)
            ->select(DB::raw('count(comments.id) as `data`'),  DB::raw( 'MONTH(comments.created_at) month'))
            ->groupby('month')
            ->get();

        $monthly_interactive_chart = new UserChart();
        $monthly_interactive_chart->title('Monthly Interactive Statistic');

        $monthly_interactive_chart->labels(["January", "February", "March", "April", "May", "June", "July","August","September","October","November","December"]);
        $monthly_interactive_chart->dataset('Views', 'line', UserChart::monthlyDataPrepare($monthlyViews))->backgroundColor("rgba(105, 0, 132, 0.2)")->color('rgba(200, 99, 132, 0.7)');
        $monthly_interactive_chart->dataset('Ratings', 'line', UserChart::monthlyDataPrepare($monthlyRatings))->backgroundColor("rgba(0, 137, 132, 0.2)")->color('rgba(0, 10, 130, 0.7)');
        $monthly_interactive_chart->dataset('Comments', 'line', UserChart::monthlyDataPrepare($monthlyComments))->backgroundColor("rgba(255, 159, 64, 0.2)")->color('rgba(255, 159, 64, 1)');


        $ratingSummary= DB::table('posts')
            ->join('ratings', 'ratings.post_id', '=', 'posts.id')
            ->where('posts.author_id', Auth::id(), true)
            ->whereYear('ratings.created_at', $year)
            ->select(DB::raw('count(ratings.id) as `data`'),  'ratings.rating')
            ->groupby('ratings.rating')
            ->orderBy('ratings.rating')
            ->get();
        $ratingChartData = UserChart::covertRatingToChart($ratingSummary);

        $rating_chart = new UserChart();
        $rating_chart->title('Rating Summary');
        $rating_chart->labels($ratingChartData['label']);
        $rating_chart->dataset('Ratings', 'bar', $ratingChartData['data'])->backgroundColor("rgba(105, 0, 132, 0.2)")->color('rgba(200, 99, 132, 0.7)');

        return view('user.dashboard',compact('year','historyYear', 'totalPosts', 'totalViews', 'totalComments','totalRatings',  'monthly_interactive_chart', 'monthly_post', 'rating_chart'));
    }
}
