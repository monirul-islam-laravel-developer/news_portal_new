<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Slider;
use Illuminate\Http\Request;
use Session;
use Carbon\Carbon;

class HomeController extends Controller
{
    private $headLines;
    private $slidernewses;
    private $saradesh;
    private $sliders;
    public function index()
    {
        $this->sliders=Slider::where('status',1)->orderBy('id','desc')->take(8)->get();
        $this->saradesh=Category::where('status',1)->skip(6)->take(1)->get();
        $this->slidernewses=Post::where('slider_news',1)->where('status',1)->latest()->take(6)->get();
        return view('front.home.home',[
            'sliderNewses'=>$this->slidernewses,
            'saradesh'=>$this->saradesh,
            'sliders'=>$this->sliders
            ]);
    }


}
