<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jurnal;
class JurnalController extends Controller
{
    public function index()
    {
        $jurnals = Jurnal::orderBy('created_at', 'desc')->paginate(10);

        return view('jurnal.index', compact('jurnals'));
    }

    public function show(Jurnal $jurnal)
    {
        $jurnal->incrementClickCount();
        return view('jurnal.show', compact('jurnal'));
    }
}
