@extends('back_end.layouts.app')
@section('classModulatorActive')
    class="active"
@endsection
@section('content')
    <div class="content" style="height: 81vh">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    @if (!isset($_GET['addModulator']))
                        <div class="card-header d-flex justify-content-between">
                            <h4 class="card-title">Modulator list</h4>
                            <div><a href="{{ route('modulator', ['addModulator' => true]) }}"><button type="button"
                                        class="btn btn-secondary">Add Modulator</button></a></div>
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
                                        @if ($modulators->count() > 0)
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
                                                        <i class="fa-solid fa-trash"></i>
                                                        <i class="fa-solid fa-pen-to-square"></i>
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
                    @else
                        <div class="card-header d-flex justify-content-between">
                            <h4 class="card-title">Add Modulator</h4>
                            <div><a href="{{ route('modulator') }}"><button type="button"
                                        class="btn btn-secondary">Modulator list</button></a></div>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{route('createModulator')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-5 pr-1">
                                        <div class="form-group">
                                            <label for="name">User_name</label>
                                            <input type="text" class="form-control" placeholder="Username" name="name">
                                        </div>
                                    </div>
                                    <div class="col-md-3 px-1">
                                        <div class="form-group">
                                            <label for="cin">CIN</label>
                                            <input type="text" class="form-control" placeholder="CIN" name="cin">
                                        </div>
                                    </div>
                                    <div class="col-md-4 pl-1">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1" for="email">Email address</label>
                                            <input type="email" class="form-control" placeholder="Email" name="email">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 pr-1">
                                        <div class="form-group">
                                            <label for="pw">Password</label>
                                            <input type="text" class="form-control" placeholder="Password" name="pw">
                                        </div>
                                    </div>
                                    <div class="col-md-6 pl-1">
                                        <div class="form-group">
                                            <label for="tel">tel_user</label>
                                            <input type="text" class="form-control" placeholder="Tel" name="tel">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="role">Role</label>
                                            <select class="custom-select" id="inputGroupSelect01" name="role">
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
                                        <button type="submit" class="btn btn-primary btn-round">Add Modulator</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
