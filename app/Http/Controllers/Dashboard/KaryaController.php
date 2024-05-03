<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Karya;

class KaryaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.karya.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.karya.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $karya = Karya::where('slug', $slug)->firstOrFail();
        return view('dashboard.karya.show', compact('karya'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $karya = Karya::where('slug', $slug)->firstOrFail();
        return view('dashboard.karya.edit', compact('karya'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
