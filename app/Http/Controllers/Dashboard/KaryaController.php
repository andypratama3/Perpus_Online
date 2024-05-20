<?php

namespace App\Http\Controllers\Dashboard;

use Str;
use Auth;
use App\Models\Karya;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\KaryaStoreRequest;
use Yajra\DataTables\Facades\DataTables;

class KaryaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.karya.index');
    }

    public function data_table()
    {
        if (Auth::user() && Auth::user()->hasRole('superadmin')) {
            $query = Karya::with('user')->select(['title','abstrack','user_id','status','slug','role_id'])->orderBy('title', 'asc');
        }else{
            $query = Karya::with('user','roles')->where('user_id', Auth::id())->select(['title','abstrack','user_id','status','slug','role_id'])->orderBy('title', 'asc');
        }

        return DataTables::eloquent($query)
        ->addColumn('user_name', function ($row) {
            return $row->user ? $row->user->name : 'User Not Found';
        })
        ->addColumn('role_name', function ($row) {
            return $row->roles ? $row->roles->name : 'User Not Found';
        })
            ->addColumn('options', function ($row) {
                return '
                    <a href="' . route('dashboard.master.karya.show', $row->slug) . '" class="btn btn-sm btn-warning"><i class="mdi mdi-eye"></i></a>
                    <a href="' . route('dashboard.master.karya.edit', $row->slug) . '" class="btn btn-sm btn-primary"><i class="mdi mdi-pen"></i></a>
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
        return view('dashboard.karya.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KaryaStoreRequest $request)
    {
        $user_id = Auth::user();

        if($request->file_karya){
            $ext = $request->file_karya->getClientOriginalExtension();

            $upload_path = public_path('storage/file/karya/');
            $file_name = 'Karya_'.Str::slug($request->title).'_'.date('YmdHis').".$ext";
            $request->file_karya->move($upload_path, $file_name);
        }

        if($request->cover_karya){
            $ext = $request->cover_karya->getClientOriginalExtension();

            $upload_path = public_path('storage/file/cover_karya/');
            $file_name_cover = 'Karya_Cover'.Str::slug($request->title).'_'.date('YmdHis').".$ext";
            $request->cover_karya->move($upload_path, $file_name_cover);
        }

        $karya = new Karya();
        $karya->title = $request->title;
        $karya->abstrack = $request->abstrack;
        $karya->file_karya = $file_name;
        $karya->user_id = $user_id->id;
        $karya->cover_karya = $file_name_cover;
        foreach ($user_id->roles as $role) {
            $karya->role_id = $role->id;
        }
        $karya->save();

        return redirect()->route('dashboard.master.karya.index')->with('success','Berhasil Menambah Karya');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $karya = Karya::where('slug', $slug)->firstOrFail();
        return view('dashboard.karya.show', compact('karya'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $karya = Karya::where('slug', $slug)->firstOrFail();

        return view('dashboard.karya.edit', compact('karya'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        $karya = Karya::where('slug', $slug)->firstOrFail();
        if($request->file_karya){
            $ext = $request->file_karya->getClientOriginalExtension();

            $upload_path = public_path('storage/file/karya/');
            $file_name = 'Karya_'.Str::slug($request->title).'_'.date('YmdHis').".$ext";
            $request->file_karya->move($upload_path, $file_name);
        }else{
            $file_name = $karya->file_karya;
        }

        if($request->cover_karya){
            $ext = $request->cover_karya->getClientOriginalExtension();

            $upload_path = public_path('storage/file/cover_karya/');
            $file_name_cover = 'Karya_Cover'.Str::slug($request->title).'_'.date('YmdHis').".$ext";
            $request->cover_karya->move($upload_path, $file_name_cover);
        }else{
            $file_name_cover = $karya->cover_karya;
        }
        $karya->title = $request->title;
        $karya->abstrack = $request->abstrack;
        $karya->file_karya = $file_name;
        $karya->user_id = $karya->user_id;
        $karya->cover_karya = $file_name_cover;

        $status = intval($request->status);
        if($status == 1){
            $karya->status = 1;
        }elseif($status == 2){
            $karya->status = 2;
        }else{
            $karya->status = 0;
        }
        $karya->update();

        return redirect()->route('dashboard.master.karya.index')->with('success','Berhasil Update Karya');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Karya $karya)
    {
        $action = $karya->delete();

        if($action){
            return response()->json(['status' => 'success', 'message' => 'Berhasil Menghapus Karya']);
        }else{
            return response()->json(['status' => 'failure', 'message' => 'Gagal Menghapus Karya']);
        }

    }
}
