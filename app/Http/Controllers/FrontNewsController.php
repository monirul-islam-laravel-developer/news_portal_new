<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\SubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\Sitemap\Tags\News;

class FrontNewsController extends Controller
{
    private $categoryNewses;
    private $subcategoryNewses;
    private $postWithCategory;
    private $postWithSubCategory;
    private $newsdetail;
    private $sameNewses;
    private $allNewses;
    private $news;
    public function categoryPost($id)
    {
        $this->categoryNewses=Post::where('status',1)->where('category_id',$id)->latest()->paginate(9);
        $this->postWithCategory = Category::where('status', 1)->where('id', $id)->orderBy('id', 'desc')->first();
        return view('front.news.category_news.catnews',[
            'categoryNewses'=>$this->categoryNewses,
            'postWithCategory'=>$this->postWithCategory
            ]);
    }
    public function postDetail($id)
    {

        $this->newsdetail=Post::where('status',1)->where('id',$id)->orderBy('id','desc')->first();
        $this->sameNewses = Post::where('status', 1)
            ->where('category_id', $this->newsdetail->category_id)
            ->where('id', '!=', $id) // Exclude the current news article
            ->orderBy('id', 'desc')
            ->take(9)
            ->get();
//        $this->postWithCategory = Category::where('status', 1)->where('id', $this->newsdetail->category_id)->orderBy('id', 'desc')->first();
//        $this->sameNewses=Post::where('status',1)->where('id',  $this->postWithCategory->category_id)->orderBy('id','desc')->take(9)->get();
        return view('front.news.newsdetail',['newsdetail'=> $this->newsdetail,
            'samenewses'=> $this->sameNewses
            ]);
    }

    public function subcategoryPost($id)
    {
        $this->subcategoryNewses=Post::where('status',1)->where('subcategory_id',$id)->latest()->paginate(9);
        $this->postWithSubCategory = SubCategory::where('status', 1)->where('id', $id)->orderBy('id', 'desc')->first();
        return view('front.news.sub-cat_news.index',[
            'subcategoryNewses'=>$this->subcategoryNewses,
            'postWithSubCategory'=>$this->postWithSubCategory
        ]);
    }
    public function allNews()
    {
        $this->allNewses=Post::where('status',1)->latest()->paginate(32);
        return view('front.news.allnews',['allnewses'=>$this->allNewses]);
    }
    public function printNews($id)
    {
        $this->news= \App\Models\Post::find($id);
        // Get the current time
        $currentTime = Carbon::now()->locale('bn')->format('h:i A');

        // Get the current date and localize it to Bangla
        $currentDate = Carbon::now()->locale('bn')->timezone('Asia/Dhaka')->isoFormat('LLL');

        // Get the current day and localize it to Bangla
        $currentDay = Carbon::now()->locale('bn')->isoFormat('dddd');
        return view('front.news.print', [
            'news'=>$this->news,
            'currentTime' => $currentTime,
            'currentDate' => $currentDate,
            'currentDay' => $currentDay,

        ]);

    }
}
