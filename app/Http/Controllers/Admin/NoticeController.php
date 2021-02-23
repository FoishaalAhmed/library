<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NoticeRequest;
use App\Model\Notice;

class NoticeController extends Controller
{

    private $notice_object;

    public function __construct()
    {
        $this->notice_object = new Notice();
        $this->middleware(['auth', 'admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notices = Notice::orderBy('date', 'desc')->get();
        return view('backend.admin.notice.index', compact('notices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.notice.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NoticeRequest $request)
    {
        //dd($request->document);

        $this->notice_object->store_notice($request);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $notice = Notice::findOrFail($id);
        return view('backend.admin.notice.update', compact('notice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function update(NoticeRequest $request, $id)
    {
        //dd($id);
        $this->notice_object->update_notice($request, $id);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->notice_object->destroy_notice($id);
        return redirect()->back();
    }
}
