<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('FrontEnd.index');
    }

    public function about_us()
    {
        return view('FrontEnd.about');

    }

    public function contact_us()
    {
        return view('FrontEnd.contact');
    }
}
