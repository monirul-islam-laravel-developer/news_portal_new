<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SubCategory extends Model
{
    use HasFactory;
    private static $subcategory;

    public static function newSubCategory($request)
    {
        self::$subcategory              =new SubCategory();
        self::$subcategory->name        =$request->name;
        self::$subcategory->slug=Str::slug($request->name);
        self::$subcategory->category_id =$request->category_id;
        self::$subcategory->description =$request->description;
        if ($request->status==1)
        {
            self::$subcategory->status  =$request->status;
        }
        self::$subcategory->save();
    }
    public static function updateSubCategory($request,$id)
    {
        self::$subcategory=SubCategory::find($id);
        self::$subcategory->name         =$request->name;
        self::$subcategory->slug=Str::slug($request->name);
        self::$subcategory->category_id  =$request->category_id;
        self::$subcategory->description  =$request->description;
        if ($request->status==1)
        {
            self::$subcategory->status    =$request->status;
        }
        self::$subcategory->save();
    }
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
