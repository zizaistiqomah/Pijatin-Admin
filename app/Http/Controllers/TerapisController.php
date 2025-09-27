<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Terapis;
use App\Models\Rating;

class TerapisController extends Controller
{
    // Kalau kamu memang pakai nama route -> controller method 'terapis'
    public function terapis(Request $request)
    {
        // optional: support pencarian
        $search = $request->input('search');

        // ambil data (pakai paginate biar sesuai desain)
        $terapis = Terapis::when($search, function($q) use ($search) {
            $q->where('nama', 'like', "%{$search}%")
              ->orWhere('email', 'like', "%{$search}%")
              ->orWhere('ponsel', 'like', "%{$search}%");
        })->orderBy('id', 'asc')->paginate(10);

        // kirim ke view
        return view('pages.data-terapis.terapis', compact('terapis', 'search'));
    }

    // (opsional) tambahkan method CRUD lain jika perlu


    public function rating()
    {
        $rating = Rating::with('terapis')->latest()->paginate(10);
        return view('pages.data-terapis.rating', compact('rating'));
    }

}
