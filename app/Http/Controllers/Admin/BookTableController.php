<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\BookTable;
use Illuminate\Http\Request;

class BookTableController extends Controller
{
    private $BookTableObject;

    public function __construct()
    {
        $this->BookTableObject = new BookTable();
        $this->middleware(['auth', 'admin']);
    }

    public function index()
    {
        $bookings = $this->BookTableObject->get_table_booking();

        return view('backend.admin.booking', compact('bookings'));
    }

    public function status(Int $id, Int $status)
    {
        $this->BookTableObject->changeBookingStatus($id, $status);
        return redirect()->back();
    }
}
