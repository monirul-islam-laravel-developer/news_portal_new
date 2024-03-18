<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Reporter;
use App\Models\Slider;
use Illuminate\Http\Request;

class FrontReporterController extends Controller
{
    private $reporters;
    private $reporter;
    private $allnewses;
    public function index()
    {
        $this->reporters = Reporter::where('status',1)->orderBy('id', 'asc')->get();

        return view('front.reporter.index',['reportershome'=>$this->reporters]);
    }
    public function detail($id)
    {
        $this->reporter = Reporter::where('status',1)->where('id',$id)->first();

        return redirect()->route('reporter-allnews',['id'=>$this->reporter->id,'slug'=>$this->reporter->slug]);
    }
    public function allnews($id)
    {
        $this->reporter = Reporter::where('status',1)->where('id',$id)->first();
        $this->allnewses = Post::where('status', 1)->where('reporter_id', $this->reporter->id)->latest()->paginate(12);

        return view('front.reporter.allnews',['singlereporter'=>$this->reporter,
            'allnewses'=>$this->allnewses
            ]);
    }
}
