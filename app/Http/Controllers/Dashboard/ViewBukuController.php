<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\View;
use DB;
use App\Models\Buku;

class ViewBukuController extends Controller
{
    public function index()
    {
        $limit = 15;

        $groupedViews = View::select('viewable_id', DB::raw('count(*) as total_views'))
                            ->groupBy('viewable_id')
                            ->get()
                            ->keyBy('viewable_id');

        $bukus = Buku::whereIn('id', $groupedViews->keys()->toArray())
                    ->orderBy('name', 'asc')
                    ->get();

        return view('dashboard.views.buku.index', compact('groupedViews', 'bukus'));
    }

    public function show($bukuId)
    {
        $buku = Buku::findOrFail($bukuId);

        // Retrieve views grouped by both viewable_id and user_id
        $groupedViews = View::select('viewable_id', 'user_id', DB::raw('count(*) as total_visits'))
                            ->where('viewable_id', $bukuId)
                            ->groupBy('viewable_id', 'user_id')
                            ->get();

        // Load the user relationship for each view
        $groupedViews->load('user');
        return view('dashboard.views.buku.show', compact('buku', 'groupedViews'));

    }


}




