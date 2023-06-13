<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Organizer;
use App\Models\Rib;
class organizerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $organizers=Organizer::with('ribs')->get();
        return view('back_end.organizer', compact('organizers'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $addOrganizer=1;
        $ribs=Rib::all();
        return view('back_end.organizer',compact('addOrganizer','ribs'));
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
        if(isset($organizerData['name_rib'])){
            $rib = new Rib();
            $rib->name_rib = $organizerData['name_rib'];
            $rib->save();
            $organizer->id_rib = Rib::where('name_rib', $organizerData['name_rib'])->value('id_rib');
        }
        elseif(isset($organizerData['list_rib'])){
            $organizer->id_rib = $organizerData['list_rib'];
        }

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
    public function edit(int $update_id)
    {
        $updateOrganizer=1;
        $organizerValue = Organizer::find($update_id);
        $ribs=Rib::all();
        return view('back_end.organizer',compact('organizerValue','updateOrganizer','ribs'));
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
