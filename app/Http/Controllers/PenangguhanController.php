<?php

namespace App\Http\Controllers;

use App\Models\Penangguhan;

class PenangguhanController extends Controller
{
    public function index()
    {
        $penangguhan = Penangguhan::with('user')->get();

        return view('pages.penangguhan.penangguhan', compact('penangguhan'));
    }
}
