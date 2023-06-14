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
    public function edit(string  $update_id)
    {
        $editOrganizer=1;
        $organizerValue = Organizer::find($update_id);
        $ribs=Rib::all();
        return view('back_end.organizer',compact('organizerValue','editOrganizer','ribs','update_id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $update_id)
    {

        $rib_input = $request->input('name_rib');
        if($rib_input){
            $rib = new Rib();
            $rib->name_rib = $request->input('name_rib');
            $rib->save();
            $idRib = $rib->id_rib;
        }
        else{
            $idRib = $request->input('list_rib');
        }
        $logoImage = $request->file('logo_organizer');
        if($logoImage){
            $logoImageName = time() . '_' . $logoImage->getClientOriginalName();
            $logoImage->move(public_path('logo_images'), $logoImageName);
            $image= 'logo_images/' . $logoImageName;
        }
        else{
            $image= $request->input('old_logo_organizer');
        }
        $values = [
            'name_organizer' => $request->input('name_organizer'),
            'description_organizer' => $request->input('description_organizer'),
            'tel_organizer' => $request->input('tel_organizer'),
            'logo_organizer' => $image,
            'id_rib' => $idRib,
            'updated_at' => now(),

        ];
        Organizer::where('id_organizer', $update_id)->update($values);
        return redirect()->route('organizer');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $delete_id)
    {
        $organizer=Organizer::find($delete_id);
        $organizer->delete();
        return redirect()->back()->with('success', 'Organizer deleted successfully');;
    }
}
