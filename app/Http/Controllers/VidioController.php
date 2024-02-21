<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class VidioController extends Controller
{
    private $videos;
    private $video;
    public function index()
    {
        return view('admin.video.index');
    }

    public function create(Request $request)
    {
        Video::newVideo($request);
        Alert::Success('Video Add Successfully', '');
        return redirect()->back();
    }

    public function manage()
    {
        $this->videos=Video::orderBy('id','desc')->get();
        return view('admin.video.manage',['videos'=>$this->videos]);
    }
    public function edit($id)
    {
        $this->video=Video::find($id);
        return view('admin.video.edit',['video'=>$this->video]);
    }
    public function update(Request $request,$id)
    {
        Video::updateVideo($request,$id);
        Alert::Success('Video Update Successfully', '');
        return redirect()->route('video.manage');
    }
    public function delete($id)
    {
        $this->video=Video::find($id);
        if (file_exists($this->video->image))
        {
            unlink($this->video->image);
        }
        $this->video->delete();
        Alert::Success('Video Delete Successfully', '');
        return redirect()->route('video.manage');
    }
}
