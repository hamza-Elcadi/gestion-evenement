<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\ImageEvent;
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
        // $images = ImageEvent::all();
        // $events=Event::with('categories','organizers','partners')->get();
        $events = Event::with('partners', 'organizers', 'categories', 'ImageEvents')->get();
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
            // dd($eventData);
            $category = new Category(['name_category' => $eventData['id_categoryNew']]);
            $category->save();
            $event->id_category = $category->id_category;
        }else{
            $event->id_category = $eventData['id_category'];
        }



        $event->save();
        $uploadImages = $request->file('uploadImage');
        if ($uploadImages) {
            // dd($uploadImages);
            foreach($uploadImages as $uploadImage){
                $uploadImageName = time() . '_' . $uploadImage->getClientOriginalName();
                $uploadImage->move(public_path('backEnd/images/events'), $uploadImageName);
                $image= new ImageEvent();
                $image->name_image = 'backEnd/images/events/' . $uploadImageName;
                $image->id_event = $event->id_event;
                $image->save();
            }
        }
        // dd($eventData['id_partner']);

        $partners = Partner::find($eventData['id_partner']);
        // dd($partner);
        for($i=0;$i<$partners->count(); $i++){
            $event->partners()->attach($partners[$i], ['id_event' => $event->id_event, 'id_partner' => $partners[$i]->id_partner]);
        }
        // $event->partners()->attach(['id_event' => $partner->id_event , 'id_partner' => $partner->id_partner]);

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
        $eventValue = Event::with('partners', 'img_events')->find($update_id);
        $partners = Partner::all();
        $organizers = Organizer::all();
        $categories = Category::all();
// dd($eventValue);
        return view('back_end.event',compact('editEvent', 'eventValue', 'partners', 'organizers', 'categories','update_id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $update_id)
    {
        $values = [
            'title_event' => $request->input('title_event'),
            'description_event' => $request->input('description_event'),
            'date_start' => $request->input('date_start'),
            'duration' => $request->input('duration'),
            'location' => $request->input('location'),
            'nbr_place' => $request->input('nbr_place'),
            'id_organizer' => $request->input('id_organizer'),
            'id_category' => $request->input('id_category'),
            'updated_at' => now(),

        ];

        Event::where('id_event', $update_id)->update($values);
        return redirect()->route('event');
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
