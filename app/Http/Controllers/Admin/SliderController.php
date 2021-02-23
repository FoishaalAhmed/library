<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{

    private $slider_object;

    public function __construct()
    {
        $this->slider_object = new Slider();
        $this->middleware(['admin', 'auth']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('backend.admin.slider', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sliders = Slider::all();
        return view('backend.admin.slider', compact('sliders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(Slider::$validateStoreRule);
        $this->slider_object->store_slider($request);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sliders = Slider::all();
        $slider  = Slider::findOrFail($id);
        return view('backend.admin.slider', compact('sliders', 'slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(Slider::$validateUpdateRule);
        $this->slider_object->update_slider($request, $id);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->slider_object->destroy_slider($id);
        return redirect()->back();
    }
    
}
