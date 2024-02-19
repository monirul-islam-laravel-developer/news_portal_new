<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Reporter extends Model
{
    use HasFactory;
    private static $image;
    private static $imageName;
    private static $directory;
    private static $imageUrl;
    private static $reporter;

    public static function getImageUrl($request)
    {
        self::$image=$request->file('image');
        self::$imageName=self::$image->getClientOriginalName();
        self::$directory='reporter-image/';
        self::$image->move(self::$directory,self::$imageName);
        self::$imageUrl=self::$directory.self::$imageName;
        return self::$imageUrl;
    }
    public static function newReporter($request)
    {
        self::$reporter= new Reporter();
        self::$reporter->name=$request->name;
        self::$reporter->slug=Str::slug($request->name);
        self::$reporter->designation=$request->designation;
        if ($request->file('image'))
        {
            self::$reporter->image=self::getImageUrl($request);
        }
        if ($request->status==1)
        {
            self::$reporter->status=$request->status;
        }
        self::$reporter->save();
    }
    public static function updateReporter($request,$id)
    {
        self::$reporter=Reporter::find($id);
        if ($request->file('image'))
        {
            if (file_exists(self::$reporter->image))
            {
                unlink(self::$reporter->image);
            }
            self::$imageUrl=self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl=self::$reporter->image;
        }
        self::$reporter->name=$request->name;
        self::$reporter->slug=Str::slug($request->name);
        self::$reporter->designation=$request->designation;
        self::$reporter->image=self::$imageUrl;
        if ($request->status==1)
        {
            self::$reporter->status=$request->status;
        }
        else
        {
            self::$reporter->status=2;
        }
        self::$reporter->save();
    }

}
