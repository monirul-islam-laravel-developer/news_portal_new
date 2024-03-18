<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class Post extends Model
{
    use HasFactory;
    private static $image;
    private static $imageName;
    private static $directory;
    private static $imageUrl;
    private static $post;

    public static function getImageUrl($request)
    {

        $date = Carbon::today()->toDateString();
        $image = $request->image;



        // Set the image name and directory
        $imageName = 'bijoybd71'.'-'.$date.'-'.time().'.'.$image->getClientOriginalExtension();
        $directory = 'news-images/';
        $imageUrl = $directory.$imageName;
        // Create the directory if it doesn't exist
        if (!file_exists($directory)) {
            mkdir($directory, 0777, true);
        }

        // Create an Intervention Image instance
        $img = Image::make($image->getRealPath());

        $img->resize(700, 400);

        // Save the image to the specified directory
        $img->save($imageUrl);

        // Return the image URL
        return $imageUrl;
    }
    public static function newpost($request)
    {
        self::$post= new Post();
        self::$post->author_id = auth()->id();
        self::$post->category_id=$request->category_id;
        self::$post->subcategory_id=$request->subcategory_id;
        self::$post->reporter_id=$request->reporter_id;
        self::$post->title=$request->title;
        $seoKeywordss = [];
        $wordss = explode(' ', $request->title);
        foreach ($wordss as $words) {
            // Remove special characters and commas using regex
            $cleanWord = str_replace(['ঃ','|', '।', ',', '_', ':', ';', '"', "'"], '', $words);
            if (!empty($cleanWord)) {
                $seoKeywordss[] = strtolower($cleanWord);
            }
        }

        self::$post->slug = implode('-', $seoKeywordss);

        self::$post->body=$request->body;
        $newsContent = str_replace('&nbsp;', ' ', request()->input('body'));
        $strippedContent = strip_tags($newsContent);
        $shortContent = Str::limit($strippedContent, 130);
        $midContent = Str::limit($strippedContent, 500);
        self::$post->short_content = $shortContent;
        self::$post->mid_content = $midContent;
        $new_words = preg_split('/\s+/', $strippedContent, -1, PREG_SPLIT_NO_EMPTY); // Split the content into an array of words
        $subTitleWords = array_slice($new_words, 0, 18); // Get the first 20 words
        $subTitle = implode(' ', $subTitleWords); // Join the words back into a string with spaces
        self::$post->sub_title = $subTitle;
        $seoKeywords = [];
        $words = explode(' ', $request->title);
        foreach ($words as $word) {
            $cleanWords = str_replace(['ঃ','|', '।', ',', '_', ':', ';', '"', "'"], '', $word);
            if (!empty($cleanWords)) {
                $seoKeywords[] = strtolower($cleanWords);
            }
        }
        self::$post->keywords = implode(', ', $seoKeywords).','.' '.'bangla news'.','.' '.'Online news'.','.' '.'Bangladeshi news'.','.' '.'bijoybd71'.','.' '.'Daily News'.','.' '.'recent news';
        if ($request->file('image'))
        {
            self::$post->image=self::getImageUrl($request);
        }
        self::$post->image_caption=$request->image_caption;
        if ($request->slider_news==1)
        {
            self::$post->slider_news=$request->slider_news;
        }
        if ($request->status==1)
        {
            self::$post->status=$request->status;
        }

        self::$post->save();
    }
    public static function updatePost($request,$id)
    {
        self::$post=Post::find($id);
        if ($request->file('image'))
        {
            if (file_exists(self::$post->image))
            {
                unlink(self::$post->image);
            }
            self::$imageUrl=self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl=self::$post->image;
        }
        self::$post->category_id=$request->category_id;
        self::$post->subcategory_id=$request->subcategory_id;
        self::$post->reporter_id=$request->reporter_id;
        self::$post->title=$request->title;
        self::$post->slug=Str::slug($request->title);
        self::$post->body=$request->body;
        self::$post->image=self::$imageUrl;
        self::$post->image_caption=$request->image_caption;
        if ($request->slider_news==1)
        {
            self::$post->slider_news=$request->slider_news;
        }
        else
        {
            self::$post->slider_news=2;
        }
        if ($request->status==1)
        {
            self::$post->status=$request->status;
        }
        else
        {
            self::$post->status=2;
        }
        self::$post->save();
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
    public function reporter()
    {
        return $this->belongsTo('App\Models\Reporter');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function getBengaliTerm()
    {
        // Determine the current season based on the current month
        $currentMonth = date('n');
        switch ($currentMonth) {
            case 12:
            case 1:
            case 2:
                return 'শীতকাল'; // Shiṭkāl - Winter season
            case 3:
            case 4:
                return 'বসন্তকাল'; // Bôshontokal - Spring season
            case 5:
            case 6:
            case 7:
                return 'গ্রীষ্মকাল'; // Grishmokal - Summer season
            case 8:
            case 9:
                return 'বর্ষা'; // Bôrsha - Monsoon
            case 10:
            case 11:
                return 'শরৎকাল'; // Shôrôtkal - Autumn season
            default:
                return 'হেমন্তকাল'; // Hemôntokal - Late Autumn/Winter
        }
    }

}
