@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')


    <form action="{{route('admin.vehicalfare.updatevehicalfare')}}" method="get">

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Route</th>
                <th>Vehicle</th>
                <th>Fare(SR)</th>
            </tr>
            </thead>
            <tbody>

            <input type="text" value="{{$data->id}}" name="id" style="display: none">
            <tr>

                <td>
                    <select name="route_id" id="" class="form-control">
                        <option> Select Route</option>
                        @foreach($route as $r)
                            @if($data->route_id == $r->id)
                                <option value="{{$r->id}}" selected>{{$r->route}}</option>
                                @else
                                <option value="{{$r->id}}" >{{$r->route}}</option>
                                @endif

                        @endforeach
                    </select>
                </td>
                <td>
                    <select name="vehical_id" id="" class="form-control">
                        <option> Select Vehicle</option>

                        @foreach($vehicle as $v)

                            @if($data->vehical_id == $v->id)
                                <option value="{{$v->id}}" selected>{{$v->name}}</option>
                            @else
                                <option value="{{$v->id}}">{{$v->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </td>
                <td>
                    <input type="text" class="form-control" name="fare" placeholder="{{$data->fare}}" value="{{$data->fare}}">
                </td>
            </tr>
            </tbody>
        </table>

        <button class="btn btn-success float-right">Update</button>
    </form>


@endsection
