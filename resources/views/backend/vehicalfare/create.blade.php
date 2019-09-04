@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')


    <form action="{{route('admin.save_fare')}}" method="post">
@csrf
        <table class="table table-bordered">
<thead>
            <tr>
                <th>Route</th>
                <th>Vehicle</th>
                <th>Fare(SR)</th>


            </tr>
</thead>
            <tbody>


                <tr>

                    <td>


                        <select name="route_id" id="" class="form-control">
                            <option> Select Route</option>
                            @foreach($route as $r)
                                <option value="{{$r->id}}">{{$r->route}}</option>
                                @endforeach
                        </select>
                    </td>
                    <td>
                        <select name="vehical_id" id="" class="form-control">
                            <option> Select Vehicle</option>

                            @foreach($vehicle as $v)
                                <option value="{{$v->id}}">{{$v->name}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input type="text" class="form-control" name="fare" placeholder="Enter Fare Here">
                    </td>
                </tr>


            </tbody>
        </table>

<button class="btn btn-success float-right">Create</button>
    </form>


@endsection
