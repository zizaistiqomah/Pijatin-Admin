<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;

class RatingController extends Controller
{
    // daftar rating (list)

    public function index()
    {
        $ratings = Rating::all();
        return view('pages.data-terapis.rating', compact('ratings'));
    }

    public function rating(Request $request)
    {
        $search = $request->input('search');

        $ulasan = Rating::with('terapis')
            ->when($search, function($q) use ($search) {
                $q->where('ulasan', 'like', "%{$search}%")
                ->orWhere('jenis_layanan', 'like', "%{$search}%")
                ->orWhereHas('terapis', function($q2) use ($search) {
                    $q2->where('nama', 'like', "%{$search}%");
                });
            })
            ->orderBy('created_at','desc')
            ->paginate(10);

        return view('pages.data-terapis.rating', compact('ulasan','search'));
    }


    // detail satu ulasan (opsional)
    public function show($id)
    {
        $rating = Rating::with('terapis','customer')->findOrFail($id);
        return view('pages.data-terapis.rating-detail', compact('rating'));
    }

    // destroy (hapus) contoh
    public function destroy($id)
    {
        $rating = Rating::findOrFail($id);
        $rating->delete();
        return redirect()->route('data-terapis.rating')->with('success','Ulasan dihapus.');
    }
}
