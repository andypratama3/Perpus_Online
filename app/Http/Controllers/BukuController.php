<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function show(Buku $buku)
    {
        return view('buku.show', compact('buku'));
    }
}
