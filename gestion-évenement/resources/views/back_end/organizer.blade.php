@extends('back_end.layouts.app')
@section('classEventActive')
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
                            </thead>
                            <tbody>
                                <tr>
                                <tr class="mx-auto" scope="row">
                                    <td colspan="7" class="p-3 mb-2 bg-info text-white " role="alert">
                                        <div class="mx-auto" style="width: 100px;">Empty</div>
                                    </td>
                                </tr>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
