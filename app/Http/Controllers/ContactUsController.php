<?php

namespace App\Http\Controllers;

use App\Models\CantancUs;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ContactUsController extends Controller
{
    private $cantact;
    public function index()
    {
        $this->cantact=CantancUs::orderBy('id','desc')->first();
        return view('admin.cantact.add',['cantact'=>$this->cantact]);
    }
    public function create(Request $request)
    {
        $this->cantact= new CantancUs();
        $this->cantact->phone=$request->phone;
        $this->cantact->mobile=$request->mobile;
        $this->cantact->email=$request->email;
        $this->cantact->address=$request->address;
        $this->cantact->save();
        Alert::Success('Cantact Us Info Create Successfully','');
        return redirect()->back();
    }
    public function update(Request $request,$id)
    {
        $this->cantact=CantancUs::find($id);
        $this->cantact->phone=$request->phone;
        $this->cantact->mobile=$request->mobile;
        $this->cantact->email=$request->email;
        $this->cantact->address=$request->address;
        $this->cantact->save();
        Alert::Success('Cantact Us Info Update Successfully','');
        return redirect()->back();
    }
}
