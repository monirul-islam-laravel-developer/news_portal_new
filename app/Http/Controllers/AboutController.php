<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;
Use RealRashid\SweetAlert\Facades\Alert;

class AboutController extends Controller
{
    private $aboutus;
    private $about;
    public function index()
    {
        $this->aboutus=AboutUs::orderBy('id','desc')->first();
        return view('admin.about.add',['aboutus'=>$this->aboutus]);

    }
    public function create(Request $request)
    {
        $this->aboutus=new AboutUs();
        $this->aboutus->about_us=$request->about_us;
        $this->aboutus->save();
        Alert::Success('About Us Create Successfully','');
        return redirect()->back();
    }
    public function update(Request $request,$id)
    {
        $this->about=AboutUs::find($id);
        $this->about->about_us=$request->about_us;
        $this->about->save();
        Alert::Success('About Us Update Successfully','');
        return redirect()->back();
    }
}
