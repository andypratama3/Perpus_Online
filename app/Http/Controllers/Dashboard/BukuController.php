<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\CategoryBuku;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTransferObjects\BukuData;
use App\Actions\Dashboard\Buku\ActionBuku;

class BukuController extends Controller
{
    public function index()
    {
        return view('dashboard.buku.index');
    }
    public function create()
    {
        $categoryBuku = CategoryBuku::all();
        return view('dashboard.buku.create', compact('categoryBuku'));

    }
    public function store(BukuData $bukuData, ActionBuku $actionBuku)
    {
        $actionBuku->execute($bukuData);
            
        // return redirect()->route('dashboard..buku.index')->with('success', 'Berhasil Menambahkan Kategori!');
    }
    public function edit($slug)
    {
        $buku = Buku::where('slug', $slug)->firstOrFail();
        return view('dashboard.buku.edit',compact('Buku'));

    }
    public function update(BukuData $bukuData, ActionBuku $actionBuku, $slug)
    {
        $actionBuku->execute($bukuData,$slug);
        return redirect()->route('dashboard..buku.index')->with('success', 'Berhasil Update Kategori!');
    }
    public function destroy(ActionDeleteBuku $actionDelete,$slug)
    {
        $actionDelete->execute($slug);
        return redirect()->route('dashboard..buku.index')->with('success', 'Berhasil Menambahkan Kategori!');

    }
}
