<?php

namespace App\Http\Controllers\Dashboard;

use Str;
use App\Models\Berita;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Dashboard\UpsertBeritaRequest;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.berita.index');
    }

    public function data_table()
    {
        $query = Berita::select(['name', 'body' , 'foto' , 'slug','created_at', 'updated_at'])->orderBy('name', 'asc');
        return DataTables::eloquent($query)
            ->addColumn('options', function ($row) {
                return '
                    <a href="' . route('dashboard.master.berita.show', $row->slug) . '" class="btn btn-sm btn-warning"><i class="mdi mdi-eye"></i></a>
                    <a href="' . route('dashboard.master.berita.edit', $row->slug) . '" class="btn btn-sm btn-primary"><i class="mdi mdi-pen"></i></a>
                    <button data-id="' . $row['slug'] . '" class="btn btn-sm btn-danger" id="btn-delete"><i class="mdi mdi-delete"></i></button>
                ';
            })
            ->rawColumns(['options'])
            ->addIndexColumn()
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.berita.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UpsertBeritaRequest $request)
    {

        if($request->foto)
        {
            $ext = $request->foto->getClientOriginalExtension();

            $upload_path = public_path('storage/img/berita/');
            $file_name = 'Berita'.Str::slug($request->name).'_'.date('YmdHis').".$ext";
            $request->foto->move($upload_path, $file_name);
        }
        $berita = new Berita();
        $berita->name = $request->name;
        $berita->body = $request->body;
        $berita->foto = $file_name;
        $berita->save();

        return redirect()->route('dashboard.master.berita.index')->with('success','Berhasil Menambahkan Berita');

    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $berita = Berita::where('slug', $slug)->firstOrFail();
        return view('dashboard.berita.show', compact('berita'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $berita = Berita::where('slug', $slug)->firstOrFail();
        return view('dashboard.berita.edit', compact('berita'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        $berita = Berita::where('slug', $slug)->firstOrFail();

        if($request->foto)
        {
            $ext = $request->foto->getClientOriginalExtension();

            $upload_path = public_path('storage/img/berita/');
            $file_name = 'Berita'.Str::slug($request->name).'_'.date('YmdHis').".$ext";
            $request->foto->move($upload_path, $file_name);
        }else{
            $file_name = $berita->foto;
        }

        $berita->name = $request->name;
        $berita->body = $request->body;
        $berita->foto = $file_name;
        $berita->update();

        return redirect()->route('dashboard.master.berita.index')->with('success','Berhasil Update Berita');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $berita = Berita::where('slug', $slug)->firstOrFail();
        $berita->delete();
        if ($berita) {
            return response()->json(['status' => 'success', 'message' => 'Berhasil Menghapus Buku']);
        } else {
            return response()->json(['status' => 'failure', 'message' => 'Gagal Menghapus Buku']);
        }
    }
}
