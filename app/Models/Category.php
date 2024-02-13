<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;
    private static $category;
    private static $image;
    private static $imageName;
    private static $directory;
    private static $imageUrl;

    public static function getImageUrl($request)
    {
        self::$image=$request->file('image');
        self::$imageName=self::$image->getClientOriginalName();
        self::$directory='category-image/';
        self::$image->move(self::$directory,self::$imageName);
        self::$imageUrl=self::$directory.self::$imageName;
        return self::$imageUrl;
    }


    public static function newCategory($request)
    {
        $category = new Category();
        $category->category_name = $request->category_name;
        $category->slug = Str::slug($request->category_name);
        if ($request->file('image'))
        {
            $category->image=self::getImageUrl($request);
        }
        $category->description = $request->description;
        if ($request->status == 1)
        {
            $category->status = $request->status;
        }
        else
        {
            $category->status = 2;
        }
        $category->save();
    }
    public static function updateCategory($request,$id)
    {
        self::$category=Category::find($id);
        if ($request->file('image'))
        {
            if (file_exists(self::$category->image))
            {
                unlink(self::$category->image);
            }
            self::$imageUrl=self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl=self::$category->image;
        }
        self::$category->category_name = $request->category_name;
        self::$category->slug = Str::slug($request->category_name);
        self::$category->image=self::$imageUrl;
        self::$category->description = $request->description;
        if ($request->status == 1)
        {
            self::$category->status = $request->status;
        }
        else
        {
            self::$category->status = 2;
        }
        self::$category->save();
    }

}
