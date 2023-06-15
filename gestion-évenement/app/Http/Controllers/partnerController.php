<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class partnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $partners=Partner::all();
        return view('back_end.partner', compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $addPartner=1;
        return view('back_end.partner',compact('addPartner'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $partnerData = $request->all();

        $partner = new Partner();
        $partner->name_partner = $partnerData['name_partner'];
        $partner->description_partner = $partnerData['description_partner'];
        $image_partner = $request->file('image_partner');
        if ($image_partner) {
            $image_partner_name = time() . '_' . $image_partner->getClientOriginalName();
            $image_partner->move(public_path('back-end/images/partners'), $image_partner_name);
            $partner->image_partner = 'back-end/images/partners/' . $image_partner_name;
        }
        $partner->save();
        return redirect()->route('addPartner')->with('success', 'Partner added successfully');
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
        $editPartner=1;
        $partnerValue = Partner::find($update_id);
        return view('back_end.partner',compact('partnerValue','editPartner','update_id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string  $update_id)
    {
        $image_partner = $request->file('image_partner');
        if ($image_partner) {
            $image_partner_name = time() . '_' . $image_partner->getClientOriginalName();
            $image_partner->move(public_path('back-end/images/partners'), $image_partner_name);
            $image= 'back-end/images/partners/' . $image_partner_name;
        }
        else{
            $image= $request->input('old_image_partner');
        }
        $values = [
            'name_partner' => $request->input('name_partner'),
            'description_partner' => $request->input('description_partner'),
            'image_partner' => $image,
            'updated_at' => now(),

        ];
        Partner::where('id_partner', $update_id)->update($values);
        return redirect()->route('partner');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $delete_id)
    {
        $partner=Partner::find($delete_id);
        if ($partner) {
            // Delete the image file
            $imagePath = $partner->image_partner;
            if ($imagePath && Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }

        $partner->delete();
        return redirect()->back()->with('success', 'Organizer deleted successfully');
        }
    }
}
