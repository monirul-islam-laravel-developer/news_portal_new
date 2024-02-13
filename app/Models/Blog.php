<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory;
    private static $image;
    private static $imageName;
    private static $directory;
    private static $imageUrl;
    private static $blog;

    public static function getImageUrl($request)
    {
        self::$image=$request->file('image');
        self::$imageName=time().'-'.self::$image->getClientOriginalName();
        self::$directory='blog-image/';
        self::$image->move(self::$directory,self::$imageName);
        self::$imageUrl=self::$directory.self::$imageName;
        return self::$imageUrl;
    }
    public static function newBlog($request)
    {
        self::$blog = new Blog();
        self::$blog->title=$request->title;
        self::$blog->slug=Str::slug($request->title);
        self::$blog->body=$request->body;
        self::$blog->image=self::getImageUrl($request);
        if ($request->status==1)
        {
            self::$blog->status=$request->status;
        }
        self::$blog->save();
    }
    public static function updateBlog($request,$id)
    {
        self::$blog=Blog::find($id);
        if ($request->file('image'))
        {
            if (file_exists(self::$blog->image))
            {
                unlink(self::$blog->image);
            }
            self::$imageUrl=self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl=self::$blog->image;
        }
        self::$blog->title=$request->title;
        self::$blog->slug=Str::slug($request->title);
        self::$blog->body=$request->body;
        self::$blog->image=self::$imageUrl;
        if ($request->status==1)
        {
            self::$blog->status=$request->status;
        }
        self::$blog->save();
    }
}
