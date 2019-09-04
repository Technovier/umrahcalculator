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
                        {{ __('Update Routes') }} <small class="text-muted">{{ __('update routes here') }}</small>
                    </h4>
                </div><!--col-->

                <div class="col-sm-7">
                    @include('backend.auth.user.includes.header-buttons2')
                </div><!--col-->
                <form action="{{route('admin.updateroute',$route_data->id)}}" METHOD="post">
                    @csrf
                    {{ method_field('PUT') }}

                    <div class="row mt-4">
                        <div class="col-md-12 ">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Route Name</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <input type="text" value="{{$route_data->route}}" name="route_name" class="form-control" size="100">
                                        </td>


                                        <td>
                                            <button type="submit" class="btn btn-primary"> Update</button>
                                        </td>

                                    </tr>
                                    </tbody>


                                </table>


                            </div>
                        </div><!--col-->
                    </div><!--row-->
                </form>

            </div><!--card-->
@endsection

