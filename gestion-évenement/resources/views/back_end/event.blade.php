@extends('back_end.layouts.app')
@section('classEventActive')
    class="active"
@endsection
@section('content')
    <div class="content pb-3" style="background-color: inherit;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    @if (isset($_GET['addEvent']))
                            <div class="card-header d-flex justify-content-between">
                                <h4 class="card-title">Add Event</h4>
                                <div>
                                    <a href="{{ route('event') }}"><button type="button" class="btn btn-primary">Event list</button></a>
                                </div>
                            </div>
                            <div class="card-body">
                                <form method="post" action="">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label for="title_event">Title</label>
                                        <input type="text" class="form-control" placeholder="title_event" name="title_event" value="">
                                    </div>
                                </div>
                                <div class="col-md-6 pl-1">
                                    <div class="form-group">
                                        <label for="location">location</label>
                                        <input type="text" class="form-control" placeholder="location" name="location" value="{{ isset($modulator1) ? $modulator1->cin : '' }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 pr-1 mb-0 ">
                                    <div class="form-group">
                                        <label for="description_event">Description</label>
                                        <textarea type="text" class="form-control" id="myTextarea" placeholder="description_event" name="description_event" value="{{ isset($modulator1) ? $modulator1->pw_user : '' }}"></textarea>

                                    </div>
                                </div>
                                <div class="col-md-6 pl-1">
                                    <div class="form-group">
                                        <label for="date_start">Date Start</label>
                                        <input type="date" class="form-control" name="date_start" id="datepicker">
                                        {{-- <input type="text" class="form-control" placeholder="Tel" name="tel_user" value="{{ isset($modulator1) ? $modulator1->tel_user : '' }}"> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label for="description_event">Number of places</label>
                                        <input name="phone" id="phone" type="Number" class="form-control" placeholder="Phone Number">
                                    </div>
                                </div>
                                <div class="col-md-6 pl-1">
                                    <div class="form-group">
                                        <label for="duration">Duration</label>
                                        <input type="text" class="form-control" placeholder="duration" name="duration" value="{{ isset($modulator1) ? $modulator1->cin : '' }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="role">Status</label>
                                        <select placeholder='location' class="custom-select" id="inputGroupSelect01" name="id_role">
                                            <option value='1'>available</option>
                                            <option value='0'>unavailable</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="role">Orgnizer</label>
                                        <select placeholder='location' class="custom-select" id="inputGroupSelect01" name="id_role">
                                            <option value='1'>available</option>
                                            <option value='0'>unavailable</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="d-flex justify-content-between">
                                            <label for="role">Categorie</label>
                                            <a href="">+add categorie</a>
                                        </div>
                                        <div>
                                            <select placeholder='location' class="custom-select" id="inputGroupSelect01" name="id_role">
                                                <option value='1'>available</option>
                                                <option value='0'>unavailable</option>
                                            </select>
                                            <input type="hidden" class="form-control" placeholder="categorie">
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="role">Partner</label>
                                        <select placeholder='location' class="custom-select" id="inputGroupSelect01" name="id_role">
                                            <option value='1'>available</option>
                                            <option value='0'>unavailable</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="ml-auto mr-auto mt-3">
                                    <label for="imageUpload" class="fs-2 d-flex flex-row justify-content-between align-items-center">
                                        <h3>Select </h3>
                                        <i class="fa-regular fa-square-caret-up fa-6x"></i>
                                        <h3>Images </h3>
                                    </label>
                                    <input type="file" class="custom-file-input" id="imageUpload" multiple>
                                    <div id="previewContainer"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="update ml-auto mr-auto">
                                    <button type="submit" class="btn btn-primary btn-round">Add Event</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    @else
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title">Event List</h4>
                        <div>
                            <a href="{{ route('addEvent', ['addEvent' => 1]) }}">
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
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
