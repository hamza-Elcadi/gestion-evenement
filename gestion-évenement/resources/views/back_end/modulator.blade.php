@extends('back_end.layouts.app')
@section('classModulatorActive')
    class="active"
@endsection
@section('content')
    <div class="content" style="background-color: inherit;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    @if (isset($_GET['addModulator']) || isset($_GET['updatedUser_id']))
                        @if(isset($_GET['addModulator']))
                            <div class="card-header d-flex justify-content-between">
                                <h4 class="card-title">Add Modulator</h4>
                                <div>
                                    <a href="{{ route('modulator') }}"><button type="button" class="btn btn-secondary">Modulator list</button></a>
                                </div>
                            </div>
                            <div class="card-body">
                                <form method="post" action="{{route('createModulator')}}">
                        @elseif(isset($_GET['updatedUser_id']))
                            <div class="card-header d-flex justify-content-between">
                                <h4 class="card-title">Update Modulator</h4>
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <a href="{{ route('modulator') }}"><button type="button" class="btn btn-secondary">Modulator list</button></a>
                                    </div>
                                    <div>
                                        <a href="{{ route('modulator', ['addModulator' => true]) }}"><button type="button"class="btn btn-secondary">Add Modulator</button></a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form method="post" action="{{route('updateModulator', ['updatedUser_id' =>$_GET['updatedUser_id'] ]) }}">
                        @endif
                            @csrf
                            <div class="row">
                                <div class="col-md-5 pr-1">
                                    <div class="form-group">
                                        <label for="name_user">User_name</label>
                                        <input type="text" class="form-control" placeholder="Username" name="name_user" value="{{ isset($modulator1) ? $modulator1->name_user : "" }}">
                                    </div>
                                </div>
                                <div class="col-md-3 px-1">
                                    <div class="form-group">
                                        <label for="cin">CIN</label>
                                        <input type="text" class="form-control" placeholder="CIN" name="cin" value="{{ isset($modulator1) ? $modulator1->cin : '' }}">
                                    </div>
                                </div>
                                <div class="col-md-4 pl-1">
                                    <div class="form-group">
                                        <label for="email_user">Email address</label>
                                        <input type="email" class="form-control" placeholder="Email" name="email_user" value="{{ isset($modulator1) ? $modulator1->email_user : '' }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label for="pw_user">Password</label>
                                        <input type="text" class="form-control" placeholder="Password" name="pw_user" value="{{ isset($modulator1) ? $modulator1->pw_user : '' }}">
                                    </div>
                                </div>
                                <div class="col-md-6 pl-1">
                                    <div class="form-group">
                                        <label for="tel_user">tel_user</label>
                                        <input type="text" class="form-control" placeholder="Tel" name="tel_user" value="{{ isset($modulator1) ? $modulator1->tel_user : '' }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="role">Role</label>
                                        <select class="custom-select" id="inputGroupSelect01" name="id_role">
                                            @if ($roles->count() > 0)
                                                @foreach ($roles as $role)
                                                    <option value="{{$role->id_role}}" selected>{{$role->name_role}}</option>
                                                @endforeach
                                            @else
                                                <option value="2">Empty</option>
                                            @endif
                                          </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="update ml-auto mr-auto">
                                    @if(isset($_GET['addModulator']))
                                    <button type="submit" class="btn btn-primary btn-round">Add Modulator</button>
                                    @else
                                    <button type="submit" class="btn btn-primary btn-round">Update Modulator</button>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                    @else
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title">Modulator list</h4>
                        <div>
                            <a href="{{ route('modulator', ['addModulator' => true]) }}">
                                <button type="button"class="btn btn-secondary">Add Modulator</button>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th scope="row">
                                        Role
                                    </th>
                                    <th scope="row">
                                        Name
                                    </th>
                                    <th scope="row">
                                        cin
                                    </th>
                                    <th scope="row">
                                        pw
                                    </th>
                                    <th scope="row">
                                        email
                                    </th>
                                    <th scope="row">
                                        tel
                                    </th>
                                </thead>
                                <tbody>
                                    @if (isset($modulators) && $modulators->count() > 0)
                                        @foreach ($modulators as $modulator)
                                            <tr>
                                                <td scope="row">
                                                    {{-- {{ $modulator->roles->name_role }} --}}
                                                </td>
                                                <td scope="row">
                                                    {{ $modulator->name_user }}
                                                </td>
                                                <td scope="row">
                                                    {{ $modulator->cin }}
                                                </td>
                                                <td scope="row">
                                                    {{ $modulator->getOriginal('pw_user') }}
                                                </td>
                                                <td scope="row">
                                                    {{ $modulator->email_user }}
                                                </td>
                                                <td scope="row">
                                                    {{ $modulator->tel_user }}
                                                </td>
                                                <td scope="row" class="d-flex justify-content-between">
                                                    <a href="{{ route('deleteUser', ['deletedUser_id' =>$modulator->id_user]) }}"><i class="fa-solid fa-trash"></i></a>
                                                    <a href="{{ route('modulator', ['updatedUser_id' =>$modulator->id_user]) }}"><i class="fa-solid fa-pen-to-square"></i></a>
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
