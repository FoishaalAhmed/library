<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware(['admin', 'auth']);
    }

    public function index()
    {
        $contact = Contact::findOrFail(1);
        return view('backend.admin.contact', compact('contact'));
    }

    public function update(Request $request, $id)
    {
        $contact = new Contact();
        $request->validate(Contact::$validateRule);
        $contact->update_contact($request, $id);
        return redirect()->back();
    }
}
