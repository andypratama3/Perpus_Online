<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use App\Models\Berita;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    public function __invoke()
    {

        $beritas = Berita::orderBy('created_at', 'desc')->take(3)->get();
        $user = Auth::user();
        $bukus = Buku::with('user')->select(['name', 'tahun_terbit', 'cover', 'description','jumlah_pengunjung', 'slug'])
                    ->orderBy('created_at', 'desc')
                    ->take(5)->get();
        return view('welcome', compact('bukus','beritas'));
    }

}
