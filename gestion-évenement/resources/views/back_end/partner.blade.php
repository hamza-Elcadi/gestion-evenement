@extends('back_end.layouts.app')
@section('classPartnerActive')
    class="active"
@endsection
@section('content')
<div class="content pb-3" style="background-color: inherit;">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                @if (isset($addPartner) || isset($editPartner))
                     @if(isset($addPartner))
                        <div class="card-header d-flex justify-content-between">
                            <h4 class="card-title">Add Partner</h4>
                            <div>
                                <a href="{{ route('event') }}" class="btn btn-primary">Event list</a>
                                <a href="{{ route('partner') }}" class="btn btn-primary">Partner list</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{route('storePartner')}}"  enctype="multipart/form-data">
                                @php
                                    $buttonContent = "Add Partner";
                                    $update = true;
                                @endphp
                    @elseif(isset($editPartner))
                        <div class="card-header d-flex justify-content-between">
                            <h4 class="card-title">Upadate Partner</h4>
                            <div>
                                <a href="{{ route('event') }}" class="btn btn-primary">Event list</a>
                                <a href="{{ route('partner') }}" class="btn btn-primary">Partner list</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{route('updatePartner',['update_id' => $update_id])}}"  enctype="multipart/form-data">
                                @php
                                    $buttonContent="Update Partner"
                                @endphp
                    @endif
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name_partner">Name</label>
                                            <input type="text" class="form-control" id="name_partner" placeholder="name_partner" name="name_partner" value="{{ isset($partnerValue) ? $partnerValue->name_partner : "" }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="image_partner">Select Image (250x400)</label>
                                        <div class="d-flex align-items-center" >
                                            <input type="file" class="custom-file-input logoOrImage" style="position: absolute;" id="image_partner logoOrImage" name="image_partner">
                                            <input type="hidden" name="old_image_partner" value="{{ isset($partnerValue) ? $partnerValue->image_partner : "" }}">
                                            <div class="btn btn-outline-primary btn-block">Add Image</div>
                                            <div id="previewContainer" style="width: 100px;"><img src="{{ isset($partnerValue) ? asset($partnerValue->image_partner) : "" }}" class="img-fluid"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="description_partner">Description</label>
                                            <textarea class="form-control" id="description_partner" placeholder="description_partner" name="description_partner">{{ isset($partnerValue) ? $partnerValue->description_partner : "" }}</textarea>
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
                    <h4 class="card-title">Partner List</h4>
                    <div>
                        <a href="{{ route('addPartner') }}">
                            <button type="button" class="btn btn-primary">Add Partner</button>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <th>
                                    name
                                </th>
                                <th>
                                    description
                                </th>
                                <th>
                                    Logo
                                </th>
                                <th></th>
                            </thead>
                            <tbody>
                                @if (isset($partners) && $partners->count() > 0)
                                    @foreach ($partners as $partner)
                                        <tr>
                                            <td scope="row">
                                                {{ $partner->name_partner }}
                                            </td>
                                            <td scope="row">
                                                {{ $partner->description_partner }}
                                            </td>
                                            <td scope="row">
                                                <div style="width: 50px;">
                                                    <img src="{{ asset($partner->image_partner) }}" alt="Partner Logo" class="img-fluid">
                                                </div>
                                            </td>
                                            <td scope="row" class="d-flex justify-content-between">
                                                <a href="{{ route('deletePartner', ['delete_id' =>$partner->id_partner]) }}"><i class="fa-solid fa-trash"></i></a>
                                                <a href="{{ route('editPartner', ['update_id' =>$partner->id_partner]) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                                            </td>

                                        </tr>
                                    @endforeach
                                    @if (session('success'))
                                        <div id="successMessage" class="alert alert-success ml-auto mr-auto fade show">
                                            session('success')
                                            <button type="button" class="close pl-4 position-relative top-0"data-dismiss="alert">&times;</button>
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
