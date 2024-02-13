<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoreImages extends Model
{
    use HasFactory;
    private static $image;
    private static $imageName;
    private static $directory;
    private static $moreImages;
    private static $imageUrl;
    private static $moreImage;

    public static function getImageUrl($moreImage)
    {
        self::$imageName=$moreImage->getClientOriginalName();
        self::$directory='more-image/';
        $moreImage->move(self::$directory,self::$imageName);
        self::$imageUrl=self::$directory.self::$imageName;
        return self::$imageUrl;
    }

    public static function newMoreImages($request,$id)
    {
        self::$moreImages=$request->file('more_image');
        foreach (self::$moreImages as $moreImage)
        {
            self::$moreImage=new MoreImages();
            self::$moreImage->product_id=$id;
            self::$moreImage->image=self::getImageUrl($moreImage);
            self::$moreImage->save();

        }
    }
}
