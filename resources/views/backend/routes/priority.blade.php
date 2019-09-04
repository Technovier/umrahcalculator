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

                <div class="row mt-4">
                    <div class="col">
                        <form action="{{route('admin.savepriority')}}" method="get">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>

                                    <th>Route</th>
<th>Select Priority</th>


                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <td>
                                        {{$user->route}}
                                    </td>

<td>
    <select name="priority_{{$user->id}}" id="" class="form-control">
        @for($i=1;$i<=$users->count();$i++)
@if($user->priority == $i)

                <option value="{{$i}}" selected>
                    {{$i}}
                </option>
    @else
                <option value="{{$i}}">
                    {{$i}}
                </option>
    @endif



            @endfor


    </select></td>

{{--                                        <a href="{{route('admin.delete_route',['route_id'=>$user->id])}}">--}}
{{--                                            <button type="button" class="btn btn-primary"> Delete</button></a> --}}

                                    </tr>
                                @endforeach






                                </tbody>


                            </table>

                            <div class="col" style="text-align: right">
                                <button type="submit" class="btn btn-success btn-sm" style="float: left;">Save</button>
                                {{ form_cancel(URL::to('/admin/Vehicals_Routes'), __('Back')) }}
                            </div><!--col-->

                            Total Routes : {{$users->count()}}

                    </div><!--col-->
                </div><!--row-->


                </form>

            </div><!--card-->
@endsection

