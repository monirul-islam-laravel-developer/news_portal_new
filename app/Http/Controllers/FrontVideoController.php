<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class FrontVideoController extends Controller
{
    private $videos;
    public function index()
    {
        $this->videos = Video::where('status',1)->orderBy('id', 'desc')->get();

        return view('front.video.index',['videos'=>$this->videos]);
    }
}
