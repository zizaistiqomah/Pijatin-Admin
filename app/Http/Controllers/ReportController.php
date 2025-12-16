<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report; 

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $reports = Report::with('customer')
            ->when($search, function ($q) use ($search) {
                $q->where('id', 'like', "%{$search}%")
                  ->orWhereHas('customer', function ($c) use ($search) {
                      $c->where('name', 'like', "%{$search}%")
                        ->orWhere('phone', 'like', "%{$search}%");
                  });
            })
            ->latest()
            ->paginate(10);

        return view('pages.data-report.report', compact('reports'));
    }

    public function show($id)
    {
        $report = Report::with('customer')->findOrFail($id);

        return view('pages.data-report.detail-report', compact('report'));
    }

    /**
     * Hapus laporan
     */
    public function destroy($id)
    {
        $report = Report::findOrFail($id);
        $report->delete();

        return redirect()
            ->route('report')
            ->with('success', 'Laporan berhasil dihapus');
    }

    /**
     * (OPSIONAL) Kirim peringatan ke terlapor
     */
    public function sendWarning($id)
    {
        $report = Report::findOrFail($id);

        // logic kirim peringatan (email / notifikasi / status)
        // contoh:
        // $report->update(['status' => 'warning_sent']);

        return back()->with('success', 'Peringatan berhasil dikirim');
    }

    /**
     * (OPSIONAL) Tangguhkan akun terlapor
     */
    public function suspendAccount($id)
    {
        $report = Report::findOrFail($id);

        // logic suspend akun
        // contoh:
        // $report->update(['status' => 'suspended']);

        return back()->with('success', 'Akun berhasil ditangguhkan');
    }
}
