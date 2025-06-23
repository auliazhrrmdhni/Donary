<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    /**
     * Menampilkan semua campaign yang disetujui.
     */
    public function index()
    {
        $campaigns = Campaign::where('status', 'disetujui')->latest()->get();
        return view('pages.campaign', compact('campaigns'));
    }

    /**
     * Menampilkan 3 campaign untuk halaman utama (home).
     */
    public function previewForHome()
    {
        $campaigns = Campaign::where('status', 'disetujui')->latest()->get();
        return view('pages.home', compact('campaigns'));
    }

    /**
     * Menampilkan detail satu campaign berdasarkan ID.
     */
    public function show($id)
    {
        $campaign = Campaign::findOrFail($id);
        return view('pages.detailPerCampaign', compact('campaign'));
    }

    public function create()
    {
        return view('campaign.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required',
            'target_donasi' => 'required|numeric|min:1',
            'image' => 'nullable|image|max:2048',
        ]);
        $filename = null;
        if ($request->hasFile('image')) {
            $filename = $request->file('image')->store('campaigns', 'public');
        }
        Campaign::create([
            'id_penggalang' => Auth::id(),
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'target_donasi' => $request->target_donasi,
            'donasi_sekarang' => 0,
            'status' => 'pending',
            'image_url' => $filename,
        ]);
        return redirect()->route('penggalang.home')->with('success', 'Campaign berhasil diajukan');
    }

}
