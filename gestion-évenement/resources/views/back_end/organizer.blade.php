@extends('back_end.layouts.app')
@section('classOrganizerActive')
    class="active"
@endsection
@section('content')
<div class="content pb-3" style="background-color: inherit;">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">Organizer List</h4>
                    <div>
                        <a href="{{ route('addOrganizer', ['addOrganizer' => 1]) }}">
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
                                                <a href="{{ route('modulator', ['updatedUser_id' =>$organizer->id_organizer]) }}"><i class="fa-solid fa-pen-to-square"></i></a>
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
            </div>
        </div>
    </div>
</div>
@endsection
