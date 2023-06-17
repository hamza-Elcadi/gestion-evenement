@extends('back_end.layouts.app')
@section('classProfileActive')
    class="active"
@endsection
@section('content')
    <div class="content" style="background-color: inherit;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title">Profile</h4>
                        {{-- <div class="d-flex justify-content-between">
                            <div>
                                <a href="{{ route('modulator') }}"><button type="button" class="btn btn-secondary">Modulator
                                        list</button></a>
                            </div>
                            <div>
                                <a href="{{ route('modulator', ['addModulator' => true]) }}"><button
                                        type="button"class="btn btn-secondary">Add Modulator</button></a>
                            </div>
                        </div> --}}
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('updateProfile', ['update_id' => Auth::user()->id_user]) }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-5 pr-1">
                                    <div class="form-group">
                                        <label for="name_user">User_name</label>
                                        <input type="text" class="form-control" placeholder="Username" name="name_user"
                                            value="{{ isset($user) ? $user->name_user : '' }}">
                                    </div>
                                </div>
                                <div class="col-md-3 px-1">
                                    <div class="form-group">
                                        <label for="cin">CIN</label>
                                        <input type="text" class="form-control" placeholder="CIN" name="cin"
                                            value="{{ isset($user) ? $user->cin : '' }}">
                                    </div>
                                </div>
                                <div class="col-md-4 pl-1">
                                    <div class="form-group">
                                        <label for="email_user">Email address</label>
                                        <input type="email" class="form-control" placeholder="Email" name="email_user"
                                            value="{{ isset($user) ? $user->email_user : '' }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label for="pw_user">Update Password</label>
                                        <input type="text" class="form-control" placeholder="Password" name="pw_user"
                                            value="">
                                    </div>
                                </div>
                                <div class="col-md-6 pl-1">
                                    <div class="form-group">
                                        <label for="tel_user">tel_user</label>
                                        <input type="text" class="form-control" placeholder="Tel" name="tel_user"
                                            value="{{ isset($user) ? $user->tel_user : '' }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="update ml-auto mr-auto">
                                    <button type="submit" class="btn btn-primary btn-round">Update Profile</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
