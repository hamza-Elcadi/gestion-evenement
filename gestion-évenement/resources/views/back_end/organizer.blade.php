@extends('back_end.layouts.app')
@section('classOrganizerActive')
    class="active"
@endsection
@section('content')
<div class="content pb-3" style="background-color: inherit;">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                @if (isset($addOrganizer) || isset($updateOrganizer))
                    @if(isset($addOrganizer))
                        <div class="card-header d-flex justify-content-between">
                            <h4 class="card-title">Add Organizer</h4>
                            <div>
                                <a href="{{ route('event') }}" class="btn btn-primary">Event list</a>
                                <a href="{{ route('organizer') }}" class="btn btn-primary">Organizer list</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{route('storeOrganizer')}}"  enctype="multipart/form-data">
                                {{$buttonContent="Add Organizer"}}
                    @elseif(isset($updateOrganizer))
                        <div class="card-header d-flex justify-content-between">
                            <h4 class="card-title">Upadate Organizer</h4>
                            <div>
                                <a href="{{ route('event') }}" class="btn btn-primary">Event list</a>
                                <a href="{{ route('organizer') }}" class="btn btn-primary">Organizer list</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="post" action=""  enctype="multipart/form-data">
                                {{$buttonContent="Update Organizer"}}
                    @endif
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name_organizer">Name</label>
                                            <input type="text" class="form-control" id="name_organizer" placeholder="name_organizer" name="name_organizer" value="{{ isset($organizerValue) ? $organizerValue->name_organizer : "" }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="tel_organizer">Tel</label>
                                            <input type="tel" class="form-control" id="tel_organizer" placeholder="tel_organizer" name="tel_organizer" value="{{ isset($organizerValue) ? $organizerValue->tel_organizer : "" }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="d-flex justify-content-between">
                                                <label for="rib">Rib</label>

                                            @if(!isset($addRib))
                                                <a href="{{route('createRib')}}">+add rib</a>
                                            </div>
                                            <select class="custom-select" id="inputGroupSelect01" name="list_rib" value="{{ isset($organizerValue) ? $organizerValue->id_rib : "" }}">
                                                @if (isset($ribs) && $ribs->count() > 0)
                                                    @foreach ($ribs as $rib)
                                                        <option value="{{$rib->id_rib}}" selected>{{$rib->name_rib}}</option>
                                                    @endforeach
                                                @else
                                                    <option value="">Empty</option>
                                                @endif
                                            </select>
                                            @else
                                                <a href="{{route('addOrganizer')}}">rib list</a>
                                            </div>
                                            <input type="text" class="form-control" placeholder="name_rib" name="name_rib">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="description_organizer">Description</label>
                                            <textarea class="form-control" id="description_organizer" placeholder="description_organizer" name="description_organizer" value="{{ isset($organizerValue) ? $organizerValue->description_organizer : "" }}"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="logo_organizer">Select Images (250x400)</label>
                                        <div class="d-flex align-items-center" >
                                            <input type="file" class="custom-file-input" style="position: absolute;" id="logo_organizer" name="logo_organizer">
                                            <input type="hidden" name="old_logo_organizer" value="{{ isset($organizerValue) ? $organizerValue->logo_organizer : "" }}">
                                            <div class="btn btn-outline-primary btn-block">Add Image</div>

                                            <div id="previewContainer" style="width: 100px;"><img src="{{ isset($organizerValue) ? asset($organizerValue->logo_organizer) : "" }}" class="img-fluid"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="update ml-auto mr-auto">
                                        <button type="submit" class="btn btn-primary btn-round">{{$buttonContent}}</button>
                                    </div>
                                </div>
                                <div class="row">
                                    @if (session('success'))
                                        <div id="successMessage" class="alert alert-success ml-auto mr-auto fade show">
                                            {{ session('success') }}
                                            <button type="button" class="close pl-4 position-relative top-0"data-dismiss="alert">&times;</button>
                                        </div>
                                    @endif
                                </div>
                            </form>
                        </div>
                @else
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">Organizer List</h4>
                    <div>
                        <a href="{{ route('addOrganizer') }}">
                            <button type="button" class="btn btn-primary">Add Organizer</button>
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
                                    Tel
                                </th>
                                <th>
                                    Rib
                                </th>
                                <th>
                                    Logo
                                </th>
                                <th></th>
                            </thead>
                            <tbody>
                                @if (isset($organizers) && $organizers->count() > 0)
                                    @foreach ($organizers as $organizer)
                                        <tr>
                                            <td scope="row">
                                                {{ $organizer->name_organizer }}
                                            </td>
                                            <td scope="row">
                                                {{ $organizer->description_organizer }}
                                            </td>
                                            <td scope="row">
                                                {{ $organizer->tel_organizer }}
                                            </td>
                                            <td scope="row">
                                                {{ $organizer->ribs->name_rib }}
                                            </td>
                                            <td scope="row">
                                                <div style="width: 50px;">
                                                    <img src="{{ asset($organizer->logo_organizer) }}" alt="Organizer Logo" class="img-fluid">
                                                </div>
                                            </td>
                                            <td scope="row" class="d-flex justify-content-between">
                                                <a href="{{ route('deleteUser', ['deletedUser_id' =>$organizer->id_organizer]) }}"><i class="fa-solid fa-trash"></i></a>
                                                <a href="{{ route('updateOrganizer', ['update_id' =>$organizer->id_organizer]) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                                            </td>

                                        </tr>
                                    @endforeach
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
