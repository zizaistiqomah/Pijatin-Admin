<?php

namespace App\Http\Controllers;

use App\Models\Suspended;

class SuspendedController extends Controller
{
    public function index()
    {
        $data = Suspended::orderBy('id', 'asc')->get();

        return view('pages.data-suspended.suspended', compact('data'));
    }
}
