<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;
    private static $category;

    public static function newCategory($request)
    {
        $category                 = new Category();
        $category->category_name  = $request->category_name;
        $category->slug           = Str::slug($request->category_name);
        $category->description    = $request->description;
        if ($request->status == 1)
        {
            $category->status     = $request->status;
        }
        else
        {
            $category->status     = 2;
        }
        $category->save();
    }
    public static function updateCategory($request,$id)
    {
        self::$category=Category::find($id);

        self::$category->category_name        = $request->category_name;
        self::$category->slug                 = Str::slug($request->category_name);
        self::$category->description          = $request->description;
        if ($request->status == 1)
        {
            self::$category->status          = $request->status;
        }
        else
        {
            self::$category->status          = 2;
        }
        self::$category->save();
    }
    public function subCategory()
    {
        return $this->hasMany('App\Models\SubCategory');
    }

}
