<?php

namespace App\Http\Controllers;

use App\Models\Logo;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class LogoController extends Controller
{
    private $logo;
    public function index()
    {
        $this->logo=Logo::orderBy('id','desc')->first();
        return view('admin.logo.add',['logo'=>$this->logo]);
    }
    public function create(Request $request)
    {
        Logo::newLogo($request);
        Alert::Success('Logo Add Successfully','');
        return redirect()->back();
    }
    public function update(Request $request,$id)
    {
        Logo::updateLogo($request,$id);
        Alert::Success('Logo Update Successfully','');
        return redirect()->back();
    }
}
