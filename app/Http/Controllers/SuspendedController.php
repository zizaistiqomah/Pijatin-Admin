<?php
namespace App\Http\Controllers;

use App\Models\Suspended;

class SuspendedController extends Controller
{
    // list/index sudah ada
    public function index()
    {
        $data = Suspended::orderBy('id', 'asc')->get();
        return view('pages.data-suspended.suspended', compact('data'));
    }

    // tambahkan/ubah method show
    public function show($id)
    {
        $item = Suspended::findOrFail($id);

        return view('pages.data-suspended.detail-suspended', compact('item',));
    }

    public function destroy($id)
    {
        $s = Suspended::findOrFail($id);
        $s->delete();
        return redirect()->route('suspended')->with('success', 'Data berhasil dihapus.');
    }
}
