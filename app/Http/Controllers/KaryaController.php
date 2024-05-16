<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karya;
use App\Models\Role;

class KaryaController extends Controller
{

    public function index()
    {
        $karyas = Karya::where('status', 1)->paginate(20);
        $roles = Role::all();
        return view('karya.index', compact('karyas','roles'));
    }
    public function show($karya)
    {
        $karya = Karya::where('slug', $karya)->where('status', 1)->firstOrFail();
        return view('karya.show', compact('karya'));
    }

}
