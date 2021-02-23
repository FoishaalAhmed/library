<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Administrator;
use App\Model\Gallery;
use App\Model\Page;
use App\Model\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $sliders        = Slider::orderBy('id', 'desc')->take(3)->get();
        $about_us       = Page::where('name', 'about-us')->first();
        $administrators = Administrator::orderBy('priority', 'desc')->get();
        $photos         = Gallery::where('type', 'Photo')->orderBy('id', 'desc')->take(9)->get();
        $videos         = Gallery::where('type', 'Video')->orderBy('id', 'desc')->take(3)->get();
        return view('frontend.index', compact('sliders', 'about_us', 'administrators', 'photos', 'videos'));
    }
}
