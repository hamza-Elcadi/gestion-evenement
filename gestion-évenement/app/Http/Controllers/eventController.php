<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\Organizer;
use App\Models\Partner;
use Illuminate\Http\Request;

class eventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $events=Event::with('categories','organizers')->get();
        return view('back_end.event',compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $addEvent=1;
        $partners = Partner::all();
        $organizers = Organizer::all();
        $categories = Category::all();
        // dd($partners);
        return view('back_end.event',compact('addEvent', 'partners', 'organizers', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $eventData = $request->all();
        $eventData['status'] = 1;

        // dd($eventData);
        $event = new Event($eventData);
        $event->id_organizer = $eventData['id_organizer'];
        if($eventData['id_categoryNew'] != null){
            $category = new Category($eventData['id_categoryNew']);
            $category->save();
            $event->id_category = $category->id_category;
        }else{
            $event->id_category = $eventData['id_category'];
        }

        $event->save();

        $partner = Partner::find($eventData['id_partner']);
        // $event->partners()->attach(['id_event' => $partner->id_event , 'id_partner' => $partner->id_partner]);
        $event->partners()->attach($partner, ['id_event' => $event->id_event, 'id_partner' => $partner->id_partner]);
        // dd($eventData);
        return redirect()->route('event')->with('success', 'Event added successfully');
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
        $editEvent=1;
        $eventValue = Event::find($update_id);
        $partners = Partner::all();
        $organizers = Organizer::all();
        $categories = Category::all();
        return view('back_end.event',compact('editEvent', 'eventValue', 'partners', 'organizers', 'categories','update_id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $update_id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $delete_id)
    {
        $event=Event::find($delete_id);
        $event->delete();
        return redirect()->back()->with('success', 'Event deleted successfully');
    }
}
