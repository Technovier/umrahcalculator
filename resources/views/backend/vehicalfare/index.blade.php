@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')






    @if ( session()->has('message'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ session('message') }}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('Vehicle Fare Management')
                    </h4>
                </div><!--col-->

                <div class="col-sm-7 pull-right">
{{--                    @include('backend.vehicalfare.create_button')--}}

{{--                    @component('backend.vehicalfare.create_vehiclefare_modal')--}}

{{--                    @endcomponent--}}
                </div><!--col-->
            </div><!--row-->




            <div class="row mt-4">
                <div class="col">


                    <div class="row " style="font-weight: bold;padding: 10px;">
                        <div class="col" >Routes</div>

                    </div>
                    <table style="width: 100%;background-color: darkslategray;color: white;border-radius: 8px;">
                        <tbody>
                    @foreach($routes as $r)

                <?php $uniquedata=$vehicalfare->where('route_id',$r->id); ?>

                        <tr>
                            <td style="padding: 10px">
                                <label for="">{{$r->route}}</label>
                            </td>
                            <td>
                                                        <div class="col" style="text-align: right">
                                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="collapse" data-target="#demo{{$r->id}}">Show Vehicles</button>

                                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal{{$r->id}}"><i class="fas fa-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i></button>

                                                        </div>
                                @component('backend.vehicalfare.applicant_modal',['route'=>$r])
                                @endcomponent
                            </td>

                                        @foreach($uniquedata as $vf)
                                                    @if(!$vf->vehical->isEmpty())
                                                        <tr id="demo{{$vf->route_id}}" class="collapse" style="background-color:lightgray;color: black;">
                                                            <td style="padding: 15px;">  {{$vf->vehical[0]->name}}
                                                            </td>
                                                            <td style="padding: 15px">{{$vf->fare}} SR</td>
                                                        </tr>

                                                    @endif

                                        @endforeach




                        </tr>


                        @endforeach
                        </tbody>
                </table>






                </div><!--col-->
            </div><!--row-->


        </div><!--card-body-->
    </div><!--card-->

@endsection
