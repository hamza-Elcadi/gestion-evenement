@extends('back_end.layouts.app')
@section('classModulatorActive')
class="active"
@endsection
@section('content')
<div class="content" style="height: 81vh">
    <div class="row" >
      <div class="col-md-12">
        <div class="card">
            @if (!isset($_GET['addModulator']))
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">Modulator list</h4>
                    <div><a href="{{route('modulator',['addModulator'=>true])}}"><button type="button" class="btn btn-secondary">Add Modulator</button></a></div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
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
                            @if($modulators->count() > 0)
                            @foreach ($modulators as $modulator)
                                <tr>
                                    <td scope="row">
                                        {{$modulator->name_user}}
                                    </td>
                                    <td scope="row">
                                        {{$modulator->cin}}
                                    </td>
                                    <td scope="row">
                                        {{$modulator->pw_user}}
                                    </td>
                                    <td scope="row">
                                        {{$modulator->email_user}}
                                    </td>
                                    <td scope="row">
                                        {{$modulator->tel_user}}
                                    </td>
                                </tr>
                        @endforeach
                        @else
                            <tr class="mx-auto" scope="row">
                                <td colspan="5" class="p-3 mb-2 bg-info text-white " role="alert"><div class="mx-auto" style="width: 100px;">Empty</div> </td>
                            </tr>

                        @endif
                        </tbody>
                    </table>
                    </div>
                </div>
            @else
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title">Add Modulator</h4>
                <div><a href="{{route('modulator')}}"><button type="button" class="btn btn-secondary">Modulator list</button></a></div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table">
                    <thead class=" text-primary">
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
                        @if($modulators->count() > 0)
                        @foreach ($modulators as $modulator)
                            <tr>
                                <td scope="row">
                                    {{$modulator->name_user}}
                                </td>
                                <td scope="row">
                                    {{$modulator->cin}}
                                </td>
                                <td scope="row">
                                    {{$modulator->pw_user}}
                                </td>
                                <td scope="row">
                                    {{$modulator->email_user}}
                                </td>
                                <td scope="row">
                                    {{$modulator->tel_user}}
                                </td>
                            </tr>
                    @endforeach
                    @else
                        <tr class="mx-auto" scope="row">
                            <td colspan="5" class="p-3 mb-2 bg-info text-white " role="alert"><div class="mx-auto" style="width: 100px;">Empty</div> </td>
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
