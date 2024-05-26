<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\CategoryBuku;
use Illuminate\Support\Facades\Auth;
use App\Models\View;
class BukuController extends Controller
{

    public function index(Request $request)
    {
        $user = Auth::user();
        $category_bukus = CategoryBuku::all();

        // Get all books initially
        $bukus = Buku::with('views')->select(['id','name', 'tahun_terbit', 'cover', 'description','slug'])
                ->orderBy('created_at', 'desc');

        // Check if the user is authenticated
        if ($user) {
            if ($user->hasRole('superadmin')) {
                // Superadmin can see all books
            } else {
                // Non-superadmin user can see books based on their roles
                $role_id = $user->roles->pluck('id')->toArray();
                $bukus->whereIn('role_id', $role_id);
            }
        }

        // Apply search filter
        if ($request->has('search')) {
            $bukus->where(function ($query) use ($request) {
                $query->where('name', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('description', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('slug', 'LIKE', '%' . $request->search . '%');
            });
        }

        // Apply category filter
        if ($request->has('category') ) {
            $bukus->whereHas('categories', function ($query) use ($request) {
                $query->where('id', $request->category);
            });
        }

        // Paginate the results
        $bukus = $bukus->paginate(10);

        return view('buku.index', compact('bukus', 'category_bukus'));
    }

    public function show(Buku $buku)
    {
        return view('buku.show', compact('buku'));
    }

    public function baca_buku($slug)
    {

        $buku = Buku::where('slug', $slug)->firstOrFail();
        if(Auth::check()){
            $user = Auth::id();
            $view = View::create([
                'viewable_id' => $buku->id,
                'user_id' => $user
            ]);
            return view('buku.baca', compact('buku'));
        }else{
            return redirect()->route('login')->with('errro','Login Terlebih Dahulu');
        }

    }
}
