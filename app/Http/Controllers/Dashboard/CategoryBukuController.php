<?php

namespace App\Http\Controllers\Dashboard;


use App\Models\CategoryBuku;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTransferObjects\CategoryBukuData;
use App\Actions\Dashboard\CategoryBuku\ActionCategoryBuku;
use App\Actions\Dashboard\CategoryBuku\ActionDeleteCategoryBuku;
class CategoryBukuController extends Controller
{
    public function index()
    {
        $no = 0;
        $categoryBuku = CategoryBuku::all();
        return view('dashboard.category_buku.index', compact('no','categoryBuku'));
    }
    public function create()
    {
        return view('dashboard.category_buku.create');

    }
    public function store(CategoryBukuData $categoryBukuData, ActionCategoryBuku $actionCategoryBuku)
    {
        $actionCategoryBuku->execute($categoryBukuData);
        return redirect()->route('dashboard.category.buku.index')->with('success', 'Berhasil Menambahkan Kategori!');
    }
    public function edit($slug)
    {
        $categoryBuku = CategoryBuku::where('slug', $slug)->firstOrFail();
        return view('dashboard.category_buku.edit',compact('categoryBuku'));

    }
    public function update(CategoryBukuData $categoryBukuData, ActionCategoryBuku $actionCategoryBuku, $slug)
    {
        $actionCategoryBuku->execute($categoryBukuData,$slug);
        return redirect()->route('dashboard.category.buku.index')->with('success', 'Berhasil Update Kategori!');
    }
    public function destroy(ActionDeleteCategoryBuku $actionDelete,$slug)
    {
        $actionDelete->execute($slug);
        return redirect()->route('dashboard.category.buku.index')->with('success', 'Berhasil Menambahkan Kategori!');

    }
}
