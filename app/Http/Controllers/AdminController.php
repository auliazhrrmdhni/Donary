<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;
use App\Models\Campaign;
use App\Models\Donation;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Hitung jumlah total berdasarkan role
        $totalDonatur = Pengguna::where('role', 'donatur')->count();
        $totalPenggalang = Pengguna::where('role', 'penggalang')->count();

        // Total donasi yang sudah masuk
        $totalDonasi = Donation::sum('jumlah'); // Pastikan fieldnya 'jumlah' di DB

        // Campaign yang belum disetujui
        $totalPendingCampaign = Campaign::where('status', 'menunggu')->count();

        // Ambil semua campaign untuk ditampilkan di tabel (jika dibutuhkan)
        $campaigns = Campaign::with('pengguna')->get(); // Pastikan relasi user() ada di model Campaign

        return view('admin.dashboard', compact(
            'totalDonatur',
            'totalPenggalang',
            'totalDonasi',
            'totalPendingCampaign',
            'campaigns'
        ));
    }

    public function manageUsers()
    {
        $users = Pengguna::orderBy('created_at', 'desc')->get(); 
        return view('admin.users', compact('users'));
    }

    public function manageDonations()
    {
        $donations = Donation::with(['pengguna', 'campaign'])->get(); // Pastikan relasi di model Donation
        return view('admin.donations', compact('donations'));
    }


    public function reviewCampaigns()
    {
        $campaigns = Campaign::with('pengguna') 
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.review-campaigns', compact('campaigns'));
    }

    public function approveCampaign($id)
    {
        $campaign = Campaign::findOrFail($id);
        $campaign->status = 'disetujui';
        $campaign->save();

        return back()->with('success', 'Campaign berhasil disetujui.');
    }

    public function rejectCampaign($id)
    {
        $campaign = Campaign::findOrFail($id);
        $campaign->status = 'ditolak';
        $campaign->save();

        return back()->with('error', 'Campaign berhasil ditolak.');
    }

    public function deleteCampaign($id)
    {
        $campaign = Campaign::findOrFail($id);
        $campaign->delete();

        return back()->with('success', 'Campaign berhasil dihapus.');
    }

    public function updateCampaignStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:menunggu,disetujui,ditolak',
        ]);

        $campaign = Campaign::findOrFail($id);
        $campaign->status = $request->status;
        $campaign->save();

        return back()->with('success', 'Status campaign diperbarui.');
    }
    
}
