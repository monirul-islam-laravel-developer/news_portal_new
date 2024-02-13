<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SubCategory extends Model
{
    use HasFactory;
    private  static $image;
    private  static $imageName;
    private  static $directory;
    private  static $imageUrl;
    private static $subcategory;

    private static function getImageUrl($request)
    {
        self::$image=$request->file('image');
        self::$imageName=self::$image->getClientOriginalName();
        self::$directory='sub-category-image/';
        self::$image->move(self::$directory,self::$imageName);
        self::$imageUrl=self::$directory.self::$imageName;
        return self::$imageUrl;
    }
    public static function newSubCategory($request)
    {
        self::$subcategory=new SubCategory();
        self::$subcategory->name=$request->name;
        self::$subcategory->slug=Str::slug($request->name);
        self::$subcategory->category_id=$request->category_id;
        self::$subcategory->description=$request->description;
        if ($request->file('image'))
        {
            self::$subcategory->image=self::getImageUrl($request);
        }
        if ($request->status==1)
        {
            self::$subcategory->status=$request->status;
        }
        self::$subcategory->save();
    }
    public static function updateSubCategory($request,$id)
    {
        self::$subcategory=SubCategory::find($id);
        if ($request->file('image'))
        {
            if (file_exists(self::$subcategory->image))
            {
                unlink(self::$subcategory->image);
            }
            self::$imageUrl=self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl=self::$subcategory->image;
        }
        self::$subcategory->name=$request->name;
        self::$subcategory->slug=Str::slug($request->name);
        self::$subcategory->category_id=$request->category_id;
        self::$subcategory->description=$request->description;
        if ($request->file('image'))
        {
            self::$subcategory->image=self::$imageUrl;
        }
        if ($request->status==1)
        {
            self::$subcategory->status=$request->status;
        }
        self::$subcategory->save();
    }
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
