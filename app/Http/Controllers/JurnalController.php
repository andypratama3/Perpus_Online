<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jurnal;
use App\Models\CategoryBuku;


class JurnalController extends Controller
{
    public function index(Request $request)
    {
        $jurnals = Jurnal::orderBy('created_at', 'desc')->paginate(20);
        $categorys = CategoryBuku::all();

        if($request->search){
            
        }
        return view('jurnal.index', compact('jurnals','categorys'));
    }

    public function show(Jurnal $jurnal)
    {
        $jurnal->incrementClickCount();
        return view('jurnal.show', compact('jurnal'));
    }
}
