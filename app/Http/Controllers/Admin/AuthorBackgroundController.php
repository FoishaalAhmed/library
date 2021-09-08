<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\AuthorBackground;
use Illuminate\Http\Request;

class AuthorBackgroundController extends Controller
{
    private $authorBackgroundObject;

    public function __construct()
    {
        $this->authorBackgroundObject = new AuthorBackground();
    }

    public function index()
    {
        $backgrounds = AuthorBackground::all();
        return view('backend.admin.authorBackground', compact('backgrounds'));
    }

    public function store(Request $request)
    {
        $request->validate(AuthorBackground::$validateRule);
        $this->authorBackgroundObject->storeAuthorBackground($request);
        return back();
    }

    public function edit($id)
    {
        $background = AuthorBackground::findOrFail($id);
        $backgrounds = AuthorBackground::all();
        return view('backend.admin.authorBackground', compact('backgrounds', 'background'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(AuthorBackground::$validateRule);
        $this->authorBackgroundObject->updateAuthorBackground($request, $id);
        return redirect()->route('backgrounds.index');
    }
}
