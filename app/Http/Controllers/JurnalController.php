<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jurnal;
use App\Models\View;
use App\Models\CategoryBuku;
use Illuminate\Support\Facades\Auth;

class JurnalController extends Controller
{
    public function index(Request $request)
    {
        $jurnals = Jurnal::orderBy('created_at', 'desc')
            ->when($request->has('search'), function ($query) use ($request) {
                return $query->where(function ($query) use ($request) {
                    $query->where('name', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('jurnal', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('slug', 'LIKE', '%' . $request->search . '%');
                });
            })->when($request->has('category'), function ($query) use ($request) {
                return $query->whereHas('jurnals_category', function($query) use ($request) {
                    $query->when($request->category != null, function($query) use ($request) {
                        $query->where('category_bukus.id', $request->category);
                    });
                });
            })
            ->paginate(20);
        $categorys = CategoryBuku::all();
        return view('jurnal.index', compact('jurnals','categorys'));
    }

    public function show(Jurnal $jurnal)
    {
        dd($jurnal);
        if(Auth::check()){
            $user = Auth::id();
            $view = View::create([
                'viewable_id' => $jurnal->id,
                'user_id' => $user
            ]);
            // $jurnal->incrementClickCount();
            return view('jurnal.show', compact('jurnal'));
        }else{
            return redirect()->route('login')->with('errro','Login Terlebih Dahulu');
        }

    }
}
