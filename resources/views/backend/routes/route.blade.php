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
                        {{ __('Routes') }} <small class="text-muted">{{ __('Route Management') }}</small>
                    </h4>
                </div><!--col-->

                <div class="col-sm-7">
                    @include('backend.auth.user.includes.header-buttons2')
                    @component('backend.routes.create_route_modal')

                    @endcomponent
                    @include('backend.auth.user.includes.header-buttons3')
                </div><!--col-->
            </div>
            @if(Session::has('message'))
                <p class="alert alert-success">{{ Session::get('message') }}</p>
            @endif
            @if(Session::has('errormessage'))
                <p class="alert alert-danger">{{ Session::get('errormessage') }}</p>
            @endif
                <div class="row mt-4">
                    <div class="col">
                        <div class="table-responsive" >
                            <table class="table" style="background-color: darkslategray;border-radius: 8px;color: white">
                                <thead>
                                <tr>

                                    <th>Route</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody >
                                @foreach($users as $user)
                                    <tr >
                                    <td>
                                        {{$user->route}}
                                        {{--                                        <input type="text" value="{{$user->route}}" name="vehical_name" class="form-control" disabled="true" style="text-align: justify">--}}
                                    </td>

                                    <td>
{{--                                        <a href="{{route('admin.edit_route',['route_id'=>$user->id])}}">--}}
{{--                                            <button type="button" class="btn btn-primary"> Edit</button></a>--}}
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#Modal{{$user->id}}"><i class="fas fa-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i></button>
                                        @component('backend.routes.edit_vehicle_modal',['vehicaldetail'=>$user])

                                        @endcomponent
                                        <a href="{{route('admin.delete_route',['route_id'=>$user->id])}}">
                                            <button type="button" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger btn-sm"> <i class="fas fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i></button></a> </td>

                                    </tr>
                                @endforeach

                                </tbody>


                            </table>


                        </div>
                    </div><!--col-->
                </div><!--row-->
                </form>

            </div><!--card-->
@endsection

