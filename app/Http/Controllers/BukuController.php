<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function show(Buku $buku)
    {
        // $query = Buku::where('slug', $buku->slug)->firstOrFail();
        // dd($query);
        return view('buku.show', compact('buku'));
    }
    public function baca_buku(Buku $slug)
    {

        return view('buku.baca', compact('slug'));
    }
}
