<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Editoral extends Model
{
    use HasFactory;
    private static $image;
    private static $imageName;
    private static $directory;
    private static $imageUrl;
    private static $editoral;

    public static function getImageUrl($request)
    {
        self::$image                    =$request->file('image');
        self::$imageName                =self::$image->getClientOriginalName();
        self::$directory='editoral-image/';
        self::$image->move(self::$directory,self::$imageName);
        self::$imageUrl               =self::$directory.self::$imageName;
        return self::$imageUrl;
    }
    public static function newEditoral($request)
    {
        self::$editoral                    = new Editoral();
        self::$editoral->name              =$request->name;
        self::$editoral->slug=Str::slug($request->name);
        self::$editoral->designation       =$request->designation;
        if ($request->file('image'))
        {
            self::$editoral->image        =self::getImageUrl($request);
        }
        if ($request->status==1)
        {
            self::$editoral->status       =$request->status;
        }
        self::$editoral->save();
    }
    public static function updateEditoral($request,$id)
    {
        self::$editoral                 =Editoral::find($id);
        if ($request->file('image'))
        {
            if (file_exists(self::$editoral->image))
            {
                unlink(self::$editoral->image);
            }
            self::$imageUrl=self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl=self::$editoral->image;
        }
        self::$editoral->name            =$request->name;
        self::$editoral->slug            =Str::slug($request->name);
        self::$editoral->designation     =$request->designation;
        self::$editoral->image=self::$imageUrl;
        if ($request->status==1)
        {
            self::$editoral->status       =$request->status;
        }
        else
        {
            self::$editoral->status=2;
        }
        self::$editoral->save();
    }

}
