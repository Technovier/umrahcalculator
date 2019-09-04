@extends('backend.layouts.app')

@section('title', app_name() )

{{--@section('breadcrumb-links')--}}
{{--    @include('backend.auth.user.includes.breadcrumb-links')--}}
{{--@endsection--}}

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0" >
                        {{ __('Vehicle') }} <small class="text-muted">{{ __('Vehical Management') }}</small>
                    </h4>
                </div><!--col-->

                <div class="col-sm-7">


                    {{--                    @include('backend.auth.user.includes.header-buttons')--}}
                    @include('backend.vehicle.create_button')

                    @component('backend.vehicle.create_vehicle_modal')

                    @endcomponent



                </div><!--col-->
            </div>

            <div class="row mt-4">
                <div class="col" >
                    <div class="table-responsive">
                        <table class="table" style="background-color: darkslategray;border-radius: 8px;color: white">
                            <thead>
                            <tr>

                                <th>Vehicle_Name</th>
                                <th>Seating_Capacity</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($vehicle as $user)



                                <td style="text-transform: capitalize;">
                                    <label type="text"  name="vehical_name" >
                                        {{$user->name}}
                                    </label>
                                </td>
                                <td>
                                    <label type="text"  name="seating_capacity" >
                                        {{$user->seating_capacity}}
                                    </label>
                                </td>

                                <td>

                                    {{--                                        <a href="{{route('admin.update_vehicle',['vehical_id'=>$user->id])}}">--}}
                                    {{--                                            <button type="button" class="btn btn-primary"> Edit</button></a>--}}

                                    {{--                                            @include('backend.vehicle.edit_button')--}}

                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#Modal{{$user->id}}"><i class="fas fa-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i></button>
                                    @component('backend.vehicle.edit_vehicle_modal',['vehicaldetail'=>$user])

                                    @endcomponent

                                    <a href="{{route('admin.delete_vehicle',['vehical_id'=>$user->id])}}">
                                        <button type="button" onclick="return confirm('Are you sure you want to delete this item?');"class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i>
                                        </button>
                                    </a>
                                </td>
                                </tr>
                            @endforeach

                            </tbody>


                        </table>


                    </div>
                </div><!--col-->
            </div><!--row-->
            <div class="row">
                <div class="col-7">
                    <div class="float-left">

                        {{'Total Vehicles :  '. $vehicle->count() }}
                    </div>
                </div>
                </form>

            </div><!--card-->
@endsection
