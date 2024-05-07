<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use App\Models\Berita;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    public function __invoke()
    {

        $beritas = Berita::orderBy('created_at', 'desc')->take(3)->get();
        $user = Auth::user();
        $bukus = Buku::select(['name', 'tahun_terbit', 'cover', 'description', 'slug'])
                    ->orderBy('created_at', 'desc')
                    ->take(5)->get();
        // if ($user->hasRole('superadmin')) {
        //     $bukus = Buku::select(['name', 'tahun_terbit', 'cover', 'description', 'slug'])
        //                 ->orderBy('created_at', 'desc')
        //                 ->take(5)->get();
        // } else {
        //     $role_id = $user->roles->pluck('id')->toArray();
        //     $bukus = Buku::select(['name', 'tahun_terbit', 'cover', 'description', 'slug'])
        //                 ->whereIn('role_id', $role_id)
        //                 ->orderBy('created_at', 'desc')
        //                 ->take(5)->get();
        // }

        return view('welcome', compact('bukus','beritas'));
    }

}
