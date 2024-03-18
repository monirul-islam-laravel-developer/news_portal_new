<?php

namespace App\Providers;

use App\Models\CantancUs;
use App\Models\Category;
use App\Models\Logo;
use App\Models\News;
use App\Models\Noticee;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use View;
use function Symfony\Component\DomCrawler\all;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function($view){
            $view->with('categories1',Category::where('status',1)->orderBy('id','asc')->take(9)->get());
            $view->with('categories2', Category::where('status', 1)->orderBy('id', 'asc')->skip(9)->take(11)->get());
            $view->with('logo', Logo::orderBy('id','desc')->first());
            $view->with('cantact', CantancUs::orderBy('id','desc')->first());
            $view->with('headlines',Post::where('status',1)->latest()->take(10)->get());
            $view->with('leatestnews10',Post::where('status',1)->latest()->take(10)->get());
            $view->with('leatestnews20',Post::where('status',1)->latest()->take(20)->get());
            $view->with('notices',Noticee::where('status',1)->latest()->take(5)->get());
            $currentMonth = Carbon::now()->subDays(30);
            $view->with('popular_newses',Post::where('status',1)->orderBy('view_count', 'desc')->where('created_at', '>=', $currentMonth)->take(20)->get());
            $view->with('popular_newses10',Post::where('status',1)->orderBy('view_count', 'desc')->where('created_at', '>=', $currentMonth)->take(10)->get());

        });
    }
}
