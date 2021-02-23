<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdministratorRequest;
use App\Model\Administrator;

class AdministratorController extends Controller
{
    private $administrator_object;

    public function __construct()
    {
        $this->administrator_object = new Administrator();
        $this->middleware(['auth', 'admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $administrators = Administrator::orderBy('priority', 'desc')->get();

        return view('backend.admin.administrator.index', compact('administrators'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.administrator.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdministratorRequest $request)
    {
        $this->administrator_object->store_administrator($request);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Administrator  $administrator
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Administrator  $administrator
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $administrator = Administrator::findOrFail($id);
        return view('backend.admin.administrator.update', compact('administrator'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Administrator  $administrator
     * @return \Illuminate\Http\Response
     */
    public function update(AdministratorRequest $request, $id)
    {
        $this->administrator_object->update_administrator($request, $id);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Administrator  $administrator
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->administrator_object->destroy_administrator($id);
        return redirect()->back();
    }
}
