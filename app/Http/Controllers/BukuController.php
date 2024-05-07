<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BukuController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        if(Auth::check()) {
            if ($user->hasRole('superadmin')) {
                $bukus = Buku::select(['name', 'tahun_terbit', 'cover', 'description', 'slug'])
                            ->orderBy('created_at', 'desc')
                            ->paginate(10);
            } else {
                $role_id = $user->roles->pluck('id')->toArray();
                $bukus = Buku::select(['name', 'tahun_terbit', 'cover', 'description', 'slug'])
                            ->whereIn('role_id', $role_id)
                            ->orderBy('created_at', 'desc')
                            ->paginate(10);
            }
        }else{
            $bukus = Buku::select(['name', 'tahun_terbit', 'cover', 'description', 'slug'])
                        ->orderBy('created_at', 'desc')
                        ->paginate(10);
        }


        return view('buku.index', compact('bukus'));
    }

    public function show(Buku $buku)
    {

        return view('buku.show', compact('buku'));
    }
    public function baca_buku(Buku $slug)
    {

        return view('buku.baca', compact('slug'));
    }
}
