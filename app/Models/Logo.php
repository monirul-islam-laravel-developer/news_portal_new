<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logo extends Model
{
    use HasFactory;
    private static $image;
    private static $imageName;
    private static $directory;
    private static $imageUrl;
    private static $logo;
    private static $mobilelogo;
    private static $desktoplogo;

    public static function mobileLogoUrl($request)
    {
        self::$image                 =$request->file('mobile_logo');
        self::$imageName             =time().''.self::$image->getClientOriginalName();
        self::$directory             ='mobile-logo-image/';
        self::$image->move(self::$directory,self::$imageName);
        self::$imageUrl              =self::$directory.self::$imageName;
        return self::$imageUrl;
    }
    public static function desktopLogoUrl($request)
    {
        self::$image               =$request->file('desktop_logo');
        self::$imageName           =time().''.self::$image->getClientOriginalName();
        self::$directory           ='desktop-logo-image/';
        self::$image->move(self::$directory,self::$imageName);
        self::$imageUrl            =self::$directory.self::$imageName;
        return self::$imageUrl;
    }
    public static function newLogo($request)
    {
        self::$logo=new Logo();
        if ($request->file('mobile_logo'))
        {
            self::$logo->mobile_logo=self::mobileLogoUrl($request);
        }
        if ($request->file('desktop_logo'))
        {
            self::$logo->desktop_logo=self::desktopLogoUrl($request);
        }
        self::$logo->save();
    }
    public static function updateLogo($request,$id)
    {
        self::$logo=Logo::find($id);
        if ($request->file('mobile_logo'))
        {
            if (file_exists(self::$logo->mobile_logo))
            {
                unlink(self::$logo->mobile_logo);
            }
            self::$mobilelogo=self::mobileLogoUrl($request);
        }
        else
        {
            self::$mobilelogo=self::$logo->mobile_logo;
        }
        if ($request->file('desktop_logo'))
        {
            if (file_exists(self::$logo->desktop_logo))
            {
                unlink(self::$logo->desktop_logo);
            }
            self::$desktoplogo=self::desktopLogoUrl($request);
        }
        else
        {
            self::$desktoplogo=self::$logo->desktop_logo;
        }
        self::$logo->mobile_logo              =self::$mobilelogo;
        self::$logo->desktop_logo             =self::$desktoplogo;
        self::$logo->save();
    }
}
