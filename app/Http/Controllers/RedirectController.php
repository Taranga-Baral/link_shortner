<?php

namespace App\Http\Controllers;

use App\Models\URL;
use Illuminate\Http\Request;

class RedirectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($short_url1)
    {
        $url = URL::where('short_url',$short_url1)->first();
        return redirect($url->long_url);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
