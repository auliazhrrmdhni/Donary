<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenggalangCampaignController extends Controller
{
    private function abortIfNotPenggalang()
    {
        if (Auth::user()->role !== 'penggalang') {
            abort(403, 'Akses ditolak. Hanya untuk penggalang.');
        }
    }

    // Menampilkan daftar campaign milik penggalang yang login
    public function index()
    {
        $this->abortIfNotPenggalang();

        $campaigns = Campaign::where('id_penggalang', Auth::id())->get();
        return view('penggalang.detailCampaigns', compact('campaigns'));
    }

    // Form tambah campaign
    public function create()
    {
        $this->abortIfNotPenggalang();

        return view('penggalang.buatCampaign');
    }

    // Simpan campaign baru
    public function store(Request $request)
    {
        $this->abortIfNotPenggalang();

        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'target_donasi' => 'required|numeric|min:1000',
            'image_url' => 'nullable|image|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image_url')) {
            $imagePath = $request->file('image_url')->store('campaigns', 'public');
        }

        Campaign::create([
            'id_penggalang' => Auth::id(),
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'target_donasi' => $request->target_donasi,
            'donasi_sekarang' => 0,
            'image_url' => $imagePath,
            'status' => 'pending',
        ]);

        return redirect()->route('penggalang.campaign.index')->with('success', 'Campaign berhasil diajukan.');
    }

    // Form edit
    public function edit($id)
    {
        $this->abortIfNotPenggalang();

        $campaign = Campaign::where('id_penggalang', Auth::id())->findOrFail($id);

        return view('penggalang.editCampaign', compact('campaign'));
    }

    // Simpan update
    public function update(Request $request, $id)
    {
        $this->abortIfNotPenggalang();

        $campaign = Campaign::where('id_penggalang', Auth::id())->findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'target_donasi' => 'required|numeric|min:1000',
            'image_url' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image_url')) {
            $imagePath = $request->file('image_url')->store('campaigns', 'public');
            $campaign->image_url = $imagePath;
        }

        $campaign->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'target_donasi' => $request->target_donasi,
        ]);

        return redirect()->route('penggalang.campaign.index')->with('success', 'Campaign berhasil diperbarui.');
    }

    // Hapus campaign
    public function destroy($id)
    {
        $this->abortIfNotPenggalang();

        $campaign = Campaign::where('id_penggalang', Auth::id())->findOrFail($id);
        $campaign->delete();

        return back()->with('success', 'Campaign berhasil dihapus.');
    }
}
