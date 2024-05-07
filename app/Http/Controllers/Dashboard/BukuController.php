<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Buku;
use App\Models\Role;
use App\Models\CategoryBuku;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\DataTransferObjects\BukuData;
use Yajra\DataTables\Facades\DataTables;
use App\Actions\Dashboard\Buku\ActionBuku;
use App\Actions\Dashboard\Buku\ActionDeleteBuku;

class BukuController extends Controller
{
    // public function __construct(){
    //     $this->middleware('permission: ');
    // }
    public function index()
    {
        return view('dashboard.buku.index');
    }
    public function data_table(Request $request)
    {
        if (Auth::user() && Auth::user()->hasRole('admin')) {
            $query = Buku::with('user')->select(['name', 'penerbit','tahun_terbit', 'penulis','seri_buku','user_add','buku','slug'])->orderBy('name', 'asc');
        }else{
            $query = Buku::where('user_add', Auth::id())->select(['name', 'penerbit','tahun_terbit', 'penulis','seri_buku','user_add','buku','slug'])->orderBy('name', 'asc');
        }

        return DataTables::eloquent($query)
        ->addColumn('user_name', function ($row) {
            return $row->user ? $row->user->name : 'User Not Found';
        })
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
        $roles = Role::all();
        $categoryBuku = CategoryBuku::all();
        return view('dashboard.buku.create', compact('roles','categoryBuku'));

    }
    public function store(BukuData $bukuData, ActionBuku $actionBuku)
    {
        $actionBuku->execute($bukuData);

        return redirect()->route('dashboard.buku.index')->with('success', 'Berhasil Menambahkan Kategori!');
    }
    public function show(Buku $buku)
    {

        return view('dashboard.buku.show', compact('buku' ));
    }
    public function edit(Buku $buku)
    {
        $roles = Role::all();
        $categoryBuku = CategoryBuku::all();

        return view('dashboard.buku.edit',compact('buku','roles','categoryBuku'));

    }
    public function update(BukuData $bukuData, ActionBuku $actionBuku, $slug)
    {
        $actionBuku->execute($bukuData,$slug);
        return redirect()->route('dashboard.buku.index')->with('success', 'Berhasil Update Buku!');
    }
    public function destroy(ActionDeleteBuku $actionDelete, $slug)
    {
        $actionDelete->execute($slug);
        if ($actionDelete) {
            return response()->json(['status' => 'success', 'message' => 'Berhasil Menghapus Buku']);
        } else {
            return response()->json(['status' => 'failure', 'message' => 'Gagal Menghapus Buku']);
        }
    }

    public function detail_buku(Buku $slug)
    {
        return view('dashboard.buku.detail_buku', compact('slug'));
    }
    public function JumlahPembaca(Request $request)
    {

        if(Auth::check()){
            $actionPembaca->execute();
            return response()->json(['status' => 'success', 'message' => 'Berhasil Menghapus Buku']);
        }else{
            return redirect()->route('login')->with('failure', 'Silahkan Login');
        }
    }
}
