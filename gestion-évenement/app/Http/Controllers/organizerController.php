<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organizer;
class organizerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('back_end.organizer');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $addOrganizer=1;
        return view('back_end.event',compact('addOrganizer'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $organizerData = $request->all();

        $organizer = new Organizer();
        $organizer->name_organizer = $organizerData['name_organizer'];
        $organizer->tel_organizer = $organizerData['tel_organizer'];
        $organizer->description_organizer = $organizerData['description_organizer'];
        $logoImage = $request->file('logo_organizer');
        if ($logoImage) {
            $logoImageName = time() . '_' . $logoImage->getClientOriginalName();
            $logoImage->move(public_path('logo_images'), $logoImageName);
            $organizer->logo_organizer = 'logo_images/' . $logoImageName;
        }
        $organizer->save();
        return redirect()->route('addOrganizer')->with('success', 'Organizer added successfully');

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
