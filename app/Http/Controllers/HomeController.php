<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campaign;

class HomeController extends Controller
{
    public function index()
    {
        $campaigns = Campaign::where('status', 'disetujui')
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();
    
        return view('pages.home', compact('campaigns'));
    }
    public function home()
    {
        $campaigns = Campaign::where('status', 'disetujui')->latest()->take(3)->get();

        return view('pages.home', compact('campaigns'));
    }
}
