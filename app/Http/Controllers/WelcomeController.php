<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function __invoke()
    {
        $bukus = Buku::select(['name', 'penerbit','tahun_terbit', 'penulis','seri_buku','user_add','buku','cover','slug'])->orderBy('name', 'asc')->get();
        return view('welcome', compact('bukus'));
    }
    
}
