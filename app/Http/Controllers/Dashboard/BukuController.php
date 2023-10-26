<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Buku;
use App\Models\CategoryBuku;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTransferObjects\BukuData;
use Yajra\DataTables\Facades\DataTables;
use App\Actions\Dashboard\Buku\ActionBuku;

class BukuController extends Controller
{
    public function index()
    {
        return view('dashboard.buku.index');
    }
    public function data_table(Request $request)
    {
        $query = Buku::select(['name', 'penerbit','tahun_terbit', 'penulis','seri_buku','buku','slug'])->orderBy('name', 'asc');

        return DataTables::eloquent($query)
            ->addColumn('options', function ($row) {
                return '
                    <a href="' . route('dashboard.buku.show', $row->slug) . '" class="btn btn-sm btn-warning"><i class="mdi mdi-eye"></i></a>
                    <a href="' . route('dashboard.buku.edit', $row->slug) . '" class="btn btn-sm btn-primary"><i class="mdi mdi-pen"></i></a>
                    <button data-id="' . $row['slug'] . '" class="btn btn-sm btn-danger" id="btn-delete"><i class="mdi mdi-delete"></i></button>
                ';
            })
            ->rawColumns(['options'])
            ->addIndexColumn()
            ->make(true);
    }
    public function create()
    {
        $categoryBuku = CategoryBuku::all();
        return view('dashboard.buku.create', compact('categoryBuku'));

    }
    public function store(BukuData $bukuData, ActionBuku $actionBuku)
    {
        $actionBuku->execute($bukuData);

        return redirect()->route('dashboard.buku.index')->with('success', 'Berhasil Menambahkan Kategori!');
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
