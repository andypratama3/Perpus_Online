<?php
namespace App\Http\Controllers\Dashboard;

use App\Models\Jurnal;
use App\Models\CategoryBuku;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\DataTransferObjects\JurnalData;
use Yajra\DataTables\Facades\DataTables;
use App\Actions\Dashboard\Jurnal\ActionJurnal;
use App\Actions\Dashboard\Jurnal\ActionDeleteJurnal;

class JurnalController extends Controller
{
    public function index()
    {
        return view('dashboard.jurnal.index');
    }
    public function data_table(Request $request)
    {
        if (Auth::user() && Auth::user()->hasRole('admin')) {
            $query = Jurnal::with('users')->select(['name','user_add','jurnal','slug'])->orderBy('name', 'asc');
        }else{
            $query = Jurnal::where('user_add', Auth::id())->select(['name','user_add','jurnal','slug'])->orderBy('name', 'asc');
        }

        return DataTables::eloquent($query)
        ->addColumn('user_name', function ($row) {
            return $row->user ? $row->user->name : 'User Not Found';
        })
            ->addColumn('options', function ($row) {
                return '
                    <a href="' . route('dashboard.jurnal.show', $row->slug) . '" class="btn btn-sm btn-warning"><i class="mdi mdi-eye"></i></a>
                    <a href="' . route('dashboard.jurnal.edit', $row->slug) . '" class="btn btn-sm btn-primary"><i class="mdi mdi-pen"></i></a>
                    <button data-id="' . $row['slug'] . '" class="btn btn-sm btn-danger" id="btn-delete"><i class="mdi mdi-delete"></i></button>
                ';
            })
            ->rawColumns(['options'])
            ->addIndexColumn()
            ->make(true);
    }
    public function create()
    {
        $categorys = CategoryBuku::select(['id','name','slug'])->get();
        return view('dashboard.jurnal.create', compact('categorys'));
    }
    public function store(JurnalData $jurnalData,ActionJurnal $actionJurnal)
    {
        $actionJurnal->execute($jurnalData);
        return redirect()->route('dashboard.jurnal.index')->with('success','Berhasil Menambahkan Jurnal');
    }
    public function show(Jurnal $jurnal)
    {
        return view('dashboard.jurnal.show', compact('jurnal'));
    }
    public function edit(Jurnal $jurnal)
    {
        $categorys = CategoryBuku::select(['id','name','slug'])->get();
        return view('dashboard.jurnal.edit', compact('jurnal','categorys'));
    }

    public function update(JurnalData $jurnalData,ActionJurnal $actionJurnal)
    {
        $actionJurnal->execute($jurnalData);
        return redirect()->route('dashboard.jurnal.index')->with('success','Berhasil Mengubah Jurnal');
    }
    public function destroy(ActionDeleteJurnal $ActionDeleteJurnal,$slug)
    {
        $ActionDeleteJurnal->execute($slug);
        if ($ActionDeleteJurnal) {
            return response()->json(['status' => 'success', 'message' => 'Berhasil Menghapus Jurnal']);
        } else {
            return response()->json(['status' => 'failure', 'message' => 'Gagal Menghapus Jurnal']);
        }
    }
    public function detail_buku(Jurnal $slug)
    {
        return view('dashboard.jurnal.detail_jurnal', compact('slug'));

    }
}
