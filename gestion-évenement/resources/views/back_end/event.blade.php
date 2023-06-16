@extends('back_end.layouts.app')
@section('classEventActive')
    class="active"
@endsection
@section('content')
    <div class="content pb-3" style="background-color: inherit;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    @if (isset($addEvent) || isset($editEvent))
                        @if (isset($addEvent))
                            <div class="card-header d-flex justify-content-between">
                                <h4 class="card-title">Add Event</h4>
                                <div>
                                    <a href="{{ route('event') }}" class="btn btn-primary">Event list</a>
                                    <a href="{{ route('partner') }}" class="btn btn-primary">Partner list</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <form method="post" action="{{ route('storeEvent') }}" enctype="multipart/form-data">
                                    @csrf
                                    @php
                                        $buttonContent = 'Add Event';
                                        $update = true;
                                    @endphp
                                @elseif(isset($editEvent))
                                    <div class="card-header d-flex justify-content-between">
                                        <h4 class="card-title">Upadate Event</h4>
                                        <div>
                                            <a href="{{ route('event') }}" class="btn btn-primary">Event list</a>
                                            <a href="{{ route('partner') }}" class="btn btn-primary">Partner list</a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form method="post"
                                            action="{{ route('updatePartner', ['update_id' => $update_id]) }}"
                                            enctype="multipart/form-data">
                                            @php
                                                $buttonContent = 'Update Event';
                                            @endphp
                        @endif
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label for="title_event">Title</label>
                                        <input type="text" class="form-control" placeholder="title_event"
                                            name="title_event"
                                            value="{{ isset($eventValue) ? $eventValue->title_event : '' }}">
                                    </div>
                                </div>
                                <div class="col-md-6 pl-1">
                                    <div class="form-group">
                                        <label for="location">location</label>
                                        <input type="text" class="form-control" placeholder="location" name="location"
                                            value="{{ isset($eventValue) ? $eventValue->location : '' }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 pr-1 mb-0 ">
                                    <div class="form-group">
                                        <label for="description_event">Description</label>
                                        <textarea type="text" class="form-control" id="myTextarea" placeholder="description_event" name="description_event">{{ isset($eventValue) ? $eventValue->description_event : '' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6 pl-1">
                                    <div class="form-group">
                                        <label for="date_start">Date Start</label>
                                        <input type="date" class="form-control" name="date_start" id="datepicker"
                                            value="{{ isset($eventValue) ? $eventValue->date_start : '' }}">
                                        {{-- <input type="text" class="form-control" placeholder="Tel" name="tel_user" value="{{ isset($modulator1) ? $modulator1->tel_user : '' }}"> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label for="nbr_place">Number of places</label>
                                        <input name="nbr_place" id="nbr_place" type="text" class="form-control"
                                            placeholder="Places Number" value="{{ isset($eventValue) ? $eventValue->nbr_palce : '' }}">
                                    </div>
                                </div>
                                <div class="col-md-6 pl-1">
                                    <div class="form-group">
                                        <label for="duration">Duration</label>
                                        <input type="text" class="form-control" placeholder="duration" name="duration"
                                            value="{{ isset($eventValue) ? $eventValue->duration : '' }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    {{-- <div class="form-group">
                                        <label for="role">Partner</label>
                                        <select placeholder='location' class="custom-select"
                                            id="inputGroupSelect01"name="id_partner">
                                            <option value="" selected disabled>Select Partner</option>
                                            @if (isset($partners) && $partners->count() > 0)
                                                @foreach ($partners as $partner)
                                                    <option value="{{ $partner->id_partner }}"
                                                        {{ isset($organizerValue) && $organizerValue->id_rib == $rib->id_rib ? 'selected' : '' }}>
                                                        {{ $partner->name_partner }}</option>
                                                @endforeach
                                            @else
                                                <option value="00000000">Empty</option>
                                            @endif
                                        </select>
                                    </div> --}}
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="role">Orgnizer</label>
                                        <select placeholder='location' class="custom-select" id="inputGroupSelect01"
                                            name="id_organizer">
                                            <option value="" selected disabled>Select Organizer</option>
                                            @if (isset($organizers) && $organizers->count() > 0)
                                                @foreach ($organizers as $organizer)
                                                    <option value="{{ $organizer->id_organizer }}"
                                                        {{ isset($eventValue) && $eventValue->id_organizer == $organizer->id_organizer ? 'selected' : '' }}>
                                                        {{ $organizer->name_organizer }}</option>
                                                @endforeach
                                            @else
                                                <option value="00000000">Empty</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="d-flex justify-content-between">
                                            <label for="role">Categorie</label>
                                        </div>
                                        <div>
                                            <select placeholder='location' class="custom-select" id="inputGroupSelect01"
                                                name="id_category">
                                                <option value="" selected disabled>Select Category</option>
                                                @if (isset($categories) && $categories->count() > 0)
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id_category }}"
                                                            {{ isset($eventValue) && $eventValue->id_category == $category->id_category ? 'selected' : '' }}>
                                                            {{ $category->name_category }}</option>
                                                    @endforeach
                                                @else
                                                    <option value="00000000">Empty</option>
                                                @endif
                                            </select>
                                            <input type="hidden" class="form-control" placeholder="categorie">
                                        </div>
                                        <div id="ribContainer" class="toggleContainer">
                                            <a href="#" class="toggleLink categoryLink">+add categorie</a>
                                            <input type="text" class="form-control toggleInput d-none"
                                                placeholder="Category Name" name="id_categoryNew">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="ml-auto mr-auto mt-3">
                                    <label for="imageUpload"
                                        class="fs-2 d-flex flex-row justify-content-between align-items-center">
                                        <h3>Select </h3>
                                        <i class="fa-regular fa-square-caret-up fa-6x"></i>
                                        <h3>Images </h3>
                                    </label>
                                    <input type="file" class="custom-file-input logoOrImage" id="imageUpload"
                                        multiple>
                                    <div id="previewContainer"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="update ml-auto mr-auto">
                                    <button type="submit"
                                        class="btn btn-primary btn-round">{{ $buttonContent }}</button>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="card-header d-flex justify-content-between">
                            <h4 class="card-title">Event List</h4>
                            <div>
                                <a href="{{ route('addOrganizer') }}">
                                    <button type="button" class="btn btn-primary">Add Organizer</button>
                                </a>
                                <a href="{{ route('addPartner') }}">
                                    <button type="button" class="btn btn-primary">Add Partner</button>
                                </a>
                                <a href="{{ route('addEvent') }}">
                                    <button type="button" class="btn btn-primary">Add Event</button>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                        <th>
                                            Title
                                        </th>
                                        <th>
                                            description
                                        </th>
                                        <th>
                                            date Start
                                        </th>
                                        <th>
                                            duration
                                        </th>
                                        <th>
                                            location
                                        </th>
                                        <th>
                                            number of places
                                        </th>
                                        <th>
                                            status
                                        </th>
                                        <th>
                                            organizers
                                        </th>
                                        <th>
                                            partner
                                        </th>
                                    </thead>
                                    <tbody>
                                        @if (isset($events) && $events->count() > 0)
                                            @foreach ($events as $event)
                                                <tr>
                                                    <td scope="row">
                                                        {{ $event->title_event }}
                                                    </td>
                                                    <td scope="row">
                                                        {{ $event->description_event }}
                                                    </td>
                                                    <td scope="row">
                                                        {{ $event->date_start }}
                                                    </td>
                                                    <td scope="row">
                                                        {{ $event->duration }}
                                                    </td>
                                                    <td scope="row">
                                                        {{ $event->location }}
                                                    </td>
                                                    <td scope="row">
                                                        {{ $event->nbr_place }}
                                                    </td>
                                                    <td scope="row">
                                                        {{ $event->status }}
                                                    </td>
                                                    <td scope="row">
                                                        {{ $event->organizers->name_organizer }}
                                                    </td>
                                                    <td scope="row">
                                                        {{ $event->categories->name_category }}
                                                    </td>
                                                    <td scope="row">
                                                        <div style="width: 50px;">
                                                            <img src="{{ asset($event->logo_event) }}"
                                                                alt="Organizer Logo" class="img-fluid">
                                                        </div>
                                                    </td>
                                                    <td scope="row" class="d-flex justify-content-between">
                                                        <a
                                                            href="{{ route('deleteEvent', ['delete_id' => $event->id_event]) }}"><i
                                                                class="fa-solid fa-trash"></i></a>
                                                        <a
                                                            href="{{ route('editEvent', ['update_id' => $event->id_event]) }}"><i
                                                                class="fa-solid fa-pen-to-square"></i></a>
                                                    </td>

                                                </tr>
                                            @endforeach
                                            @if (session('success'))
                                                <div id="successMessage"
                                                    class="alert alert-success ml-auto mr-auto fade show">
                                                    {{ session('success') }}
                                                    <button type="button"
                                                        class="close pl-4 position-relative top-0"data-dismiss="alert">&times;</button>
                                                </div>
                                            @endif
                                        @else
                                            <tr class="mx-auto" scope="row">
                                                <td colspan="5" class="p-3 mb-2 bg-info text-white " role="alert">
                                                    <div class="mx-auto" style="width: 100px;">Empty</div>
                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
