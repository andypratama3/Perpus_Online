<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Karya;
use App\Models\Jurnal;
use App\Models\Buku;
use App\Models\User;
use App\Models\CategoryBuku;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('role: superadmin');
    // }
    public function __invoke()
    {
        if(Auth::user()->roles != 'superadmin'){
            $count_file_karya = Karya::where('user_id', Auth::id())->count();
        }else{
            $count_file_karya = Karya::count();
        }

        $count_buku_literasi = Buku::count();
        $count_jurnal = Jurnal::count();
        $count_kategori = CategoryBuku::count();
        $count_user = User::count();
        return view('dashboard.index', compact(
            'count_buku_literasi',
            'count_jurnal',
            'count_file_karya',
            'count_kategori' ,
            'count_user'
        ));
    }
}
