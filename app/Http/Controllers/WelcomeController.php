<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use App\Models\Berita;
class WelcomeController extends Controller
{
    public function __invoke()
    {

        $beritas = Berita::orderBy('created_at', 'desc')->take(3)->get();
        $bukus = Buku::select(['name', 'penerbit','tahun_terbit', 'penulis','seri_buku','user_add','buku','cover','slug'])->orderBy('name', 'asc')->get();
        return view('welcome', compact('bukus','beritas'));
    }

}
