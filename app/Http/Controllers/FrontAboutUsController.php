<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;

class FrontAboutUsController extends Controller
{
    private $frontaboutus;
    public function index()
    {
        $this->frontaboutus = AboutUs::where('status',1)->orderBy('id', 'desc')->first();

        return view('front.aboutus.index',['aboutus'=>$this->frontaboutus]);
    }
}
