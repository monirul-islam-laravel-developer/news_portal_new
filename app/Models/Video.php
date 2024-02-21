<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    private static $image;
    private static $imageName;
    private static $directory;
    private static $imageUrl;
    private static $video;

    public static function getImageUrl($request)
    {
        self::$image=$request->file('image');
        self::$imageName=time().'-'.self::$image->getClientOriginalName();
        self::$directory='video-image/';
        self::$image->move(self::$directory,self::$imageName);
        self::$imageUrl=self::$directory.self::$imageName;
        return self::$imageUrl;
    }
    public static function newVideo($request)
    {
        self::$video= new Video();
        self::$video->title=$request->title;
        self::$video->link=$request->link;
        if ($request->file('image'))
        {
            self::$video->image=self::getImageUrl($request);
        }
        if ($request->status==1)
        {
            self::$video->status=$request->status;
        }
        self::$video->save();
    }
    public static function updateVideo($request,$id)
    {
        self::$video=Video::find($id);
        if ($request->file('image'))
        {
            if (file_exists(self::$video->image))
            {
                unlink(self::$video->image);
            }
            self::$imageUrl=self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl=self::$video->image;
        }
        self::$video->title=$request->title;
        self::$video->link=$request->link;
        self::$video->image=self::$imageUrl;
        if ($request->status==1)
        {
            self::$video->status=$request->status;
        }
        else
        {
            self::$video->status=2;
        }
        self::$video->save();
    }
}
