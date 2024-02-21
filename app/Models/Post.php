<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;
    private static $image;
    private static $imageName;
    private static $directory;
    private static $imageUrl;
    private static $post;

    public static function getImageUrl($request)
    {
        self::$image=$request->file('image');
        self::$imageName=time().'-'.self::$image->getClientOriginalName();
        self::$directory='post-image/';
        self::$image->move(self::$directory,self::$imageName);
        self::$imageUrl=self::$directory.self::$imageName;
        return self::$imageUrl;
    }
    public static function newpost($request)
    {
        self::$post= new Post();
        self::$post->category_id=$request->category_id;
        self::$post->subcategory_id=$request->subcategory_id;
        self::$post->reporter_id=$request->reporter_id;
        self::$post->title=$request->title;
        self::$post->slug=Str::slug($request->title);
        self::$post->body=$request->body;
        if ($request->file('image'))
        {
            self::$post->image=self::getImageUrl($request);
        }
        self::$post->image_caption=$request->image_caption;
        if ($request->slider_news==1)
        {
            self::$post->slider_news=$request->slider_news;
        }
        if ($request->status==1)
        {
            self::$post->status=$request->status;
        }

        self::$post->save();
    }
    public static function updatePost($request,$id)
    {
        self::$post=Post::find($id);
        if ($request->file('image'))
        {
            if (file_exists(self::$post->image))
            {
                unlink(self::$post->image);
            }
            self::$imageUrl=self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl=self::$post->image;
        }
        self::$post->category_id=$request->category_id;
        self::$post->subcategory_id=$request->subcategory_id;
        self::$post->reporter_id=$request->reporter_id;
        self::$post->title=$request->title;
        self::$post->slug=Str::slug($request->title);
        self::$post->body=$request->body;
        self::$post->image=self::$imageUrl;
        self::$post->image_caption=$request->image_caption;
        if ($request->slider_news==1)
        {
            self::$post->slider_news=$request->slider_news;
        }
        else
        {
            self::$post->slider_news=2;
        }
        if ($request->status==1)
        {
            self::$post->status=$request->status;
        }
        else
        {
            self::$post->status=2;
        }
        self::$post->save();
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
    public function reporter()
    {
        return $this->belongsTo('App\Models\Reporter');
    }
}
