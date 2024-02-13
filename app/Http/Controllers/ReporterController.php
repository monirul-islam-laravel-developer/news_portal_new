<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReporterController extends Controller
{
    public function index()
    {
        return view('admin.reporter.index');
    }
}
