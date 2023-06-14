<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rib;
class ribController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $addOrganizer=1;
        $addRib=1;
        return view('back_end.organizer',compact('addOrganizer','addRib'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ribData = $request->all();
        $rib = new Rib();
        $rib->name_rib = $ribData['name_rib'];
        $rib->save();
        return redirect()->route('createRib');

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
        $addOrganizer=1;
        $addRib=1;
        return view('back_end.organizer',compact('addOrganizer','addRib'));
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
