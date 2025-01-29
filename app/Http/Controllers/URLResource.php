<?php

namespace App\Http\Controllers;

use App\Models\URL;
use Illuminate\Http\Request;

class URLResource extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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



        $request->validate([
            "long_url" => "required",
        ]);

        $url = new URL();
        $url->long_url = $request->long_url;
        $long_url = $request->long_url;
        $slug= uniqid();
        $url->short_url = $slug;
        $url->save();

        return view('welcome',compact('slug','long_url'));
        // return $slug;



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
