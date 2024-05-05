<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KaryaController extends Controller
{
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
