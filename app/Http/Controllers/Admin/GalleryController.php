<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{

    private $gallery_object;

    public function __construct()
    {
        $this->gallery_object = new Gallery();
        $this->middleware(['admin', 'auth']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::all();
        return view('backend.admin.gallery', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $galleries = Gallery::all();
        return view('backend.admin.gallery', compact('galleries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(Gallery::$validateRule);
        $this->gallery_object->store_gallery($request);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $galleries = Gallery::all();
        $gallery  = Gallery::findOrFail($id);
        return view('backend.admin.gallery', compact('galleries', 'gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(Gallery::$validateRule);
        $this->gallery_object->update_gallery($request, $id);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->gallery_object->destroy_gallery($id);
        return redirect()->back();
    }
}
