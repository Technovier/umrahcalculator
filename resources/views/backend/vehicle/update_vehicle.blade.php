@extends('backend.layouts.app')

@section('title', app_name() )

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0" >
                        {{ __('Update Vehicle') }} <small class="text-muted">{{ __('labels.backend.access.users.active') }}</small>
                    </h4>
                </div><!--col-->

                <div class="col-sm-7">
                    @include('backend.auth.user.includes.header-buttons')
                </div><!--col-->
                <form action="{{route('admin.updatevehical',$vehical_data->id)}}" METHOD="post">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="row mt-4">
                        <div class="col">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Vehicle_Name</th>
                                        <th>Seating_Capacity</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>


                                        <tr>

                                            <td>
                                                <input type="text" value="{{$vehical_data->name}}" name="vehical_name" class="form-control">
                                            </td>
                                            <td>
                                                <input type="text" value="{{$vehical_data->seating_capacity}}" name="seating_capacity" class="form-control">
                                            </td>

                                            <td>
                                                <button type="submit" class="btn btn-primary"> Update</button>
                                            </td>

{{--                                            <td>--}}
{{--                                                <a href="{{route('admin.delete_vehicle',['vehical_id'=>$user->id])}}">--}}
{{--                                                    <button type="button" class="btn btn-primary"> Delete</button></td>--}}
{{--                                            </a>--}}
                                        </tr>


                                    </tbody>

                                </table>

                                    <div class="col">
                                        {{ form_cancel(URL::to('/admin/vehicle'), __('buttons.general.cancel')) }}
                                    </div><!--col-->

                                </div><!--row-->
                        </div><!--col-->
                    </div><!--row-->
                </form>

            </div><!--card-->
@endsection
