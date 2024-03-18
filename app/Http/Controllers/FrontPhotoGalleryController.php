<?php

namespace App\Http\Controllers;


use App\Models\Slider;
use Illuminate\Http\Request;

class FrontPhotoGalleryController extends Controller
{
    private $frontphptogallery;
    public function index()
    {
        $this->frontphptogallery = Slider::where('status',1)->orderBy('id', 'desc')->get();

        return view('front.photo.index',['photogalleries'=>$this->frontphptogallery]);
    }
}
