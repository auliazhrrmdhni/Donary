<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Pengguna;
use App\Models\Donasi;

class AdminDashboardController extends Controller
{

    public function index()
    {
        $totalDonatur = Pengguna::where('role', 'donatur')->count();
        $totalPenggalang = Pengguna::where('role', 'penggalang')->count();
        $totalDonasi = Donasi::sum('nominal');
        $totalPendingCampaign = Campaign::where('status', 'menunggu')->count();

        $campaigns = Campaign::latest()->get();

        return view('admin.dashboard', compact(
            'totalDonatur',
            'totalPenggalang',
            'totalDonasi',
            'totalPendingCampaign',
            'campaigns' 
        ));
    }

    public function setujui($id)
    {
        Campaign::where('id', $id)->update(['status' => 'disetujui']);
        return back()->with('success', 'Campaign disetujui.');
    }

    public function tolak($id)
    {
        Campaign::where('id', $id)->update(['status' => 'ditolak']);
        return back()->with('success', 'Campaign ditolak.');
    }

    public function hapus($id)
    {
        Campaign::destroy($id);
        return back()->with('success', 'Campaign dihapus.');
    }
}
