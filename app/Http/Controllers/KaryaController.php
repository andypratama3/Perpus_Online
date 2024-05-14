<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karya;
use App\Models\Role;

class KaryaController extends Controller
{

    public function index()
    {
        $karyas = Karya::where('status', 1)->paginate(10);
        $roles = Role::all();
        return view('karya.index', compact('karyas','roles'));
    }
    public function create(Request $request)
    {
        return view('karya.create');
    }

    // public function store(KaryaStoreRequest $request)
    // {
    //     $karya = new Karya();
    //     $karya->title = $request->title;
    //     $karya->abstrack = $request->abstrack;
    //     $karya->file_karya = $request->file_karya;
    //     $karya->save();
    //     return redirect()->route('karya.index')->with('success','Berhasil Menambahkan Karya');
    // }
}
