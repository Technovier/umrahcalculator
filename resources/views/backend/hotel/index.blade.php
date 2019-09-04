@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
    <script>

        $(document).ready(function () {

        });
    </script>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('Hotel Management')
                    </h4>
                </div><!--col-->

                <div class="col-sm-7 pull-right">

                    @include('backend.hotel.create_button ')
                    @component('backend.hotel.create_hotel_modal')
                    @endcomponent

                </div><!--col-->
            </div><!--row-->
            @if(Session::has('message'))
                <p class="alert alert-success">{{ Session::get('message') }}</p>
            @endif
            @if(Session::has('errormessage'))
                <p class="alert alert-danger">{{ Session::get('errormessage') }}</p>
            @endif
            <div class="row mt-4">
                <div class="col">

<div class="float-right" style="padding: 5px;">

    <a href="{{route('admin.hotel.index',['location'=>2])}}"><button class="btn btn-dark btn-sm">Madina Hotels</button></a>
    <a href="{{route('admin.hotel.index',['location'=>1])}}"><button class="btn btn-primary btn-sm">Makkah Hotels</button>
    <a href="{{route('admin.hotel.index')}}"><button class="btn btn-warning btn-sm">All Hotels</button>
    </a>
</div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                Search
                            </span>
                        </div>

                        <input id="myInput" onkeyup="myFunction()"  type="text" class="form-control" placeholder="Enter Hotel Name" aria-label="Username" aria-describedby="basic-addon1">

                    </div>
                    <script>
                        function myFunction()
                        {
                            var input, filter, table, tr, td, i, txtValue;
                            input = document.getElementById("myInput");
                            filter = input.value.toUpperCase();
                            table = document.getElementById("myTable");
                            tr = table.getElementsByTagName("tr");
                            for (i = 0; i < tr.length; i++) {
                                td = tr[i].getElementsByTagName("td")[0];
                                if (td) {
                                    txtValue = td.textContent || td.innerText;
                                    if (txtValue.toUpperCase().indexOf(filter) > -1)
                                    {
                                        tr[i].style.display = "";
                                    }
                                    else
                                    {
                                        tr[i].style.display = "none";
                                    }
                                }
                            }
                        }
                    </script>
                    <div class="table-responsive">
                        <table class="table table-hover" id="myTable">
                            <thead>
                            <tr>
                                <th>@lang('Name')</th>
                                <th>@lang('Location')</th>
                                <th>@lang('Type')</th>
                                <th>@lang('Distance Description')</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            @foreach($hotel_with_rooms as $hr)
                                @component('backend.hotel.applicant_modal', ['hotel' => $hr])
                                @endcomponent
                                {{--{{dd($hr->hoteltype[0]->type)}}--}}
                                @if($hr->hoteltype[0]->type=='Economy')
{{--                                    <tr style="background-color: darkslategray;color: white">--}}
                                    <tr class="table-warning">
                                @else
                                    <tr style="background-color: #0b4d75;color: white" >
                                        @endif
                                        <td style='text-transform: capitalize'>{{$hr->name}}</td>
                                        <td>{{$hr->location[0]->name}}</td>
                                        <td>{{$hr->hoteltype[0]->type}}</td>
                                        <td>{{$hr->distance}}</td>
                                        <td>
                                            {!! $hr->action_buttons !!}
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal{{$hr->id}}"><i class="fas fa-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i></button>
                                            <button type="button" class="btn btn-success btn-sm" data-toggle="collapse" data-target="#demo{{$hr->id}}"><i class="fas fa-info"></i></button>
                                        </td>
                                    <td>


                                    @if($hr->hoteltype[0]->type=='Economy')
                                        <div style="width:100%;background-color: #0b4d75;color: white" id="demo{{$hr->id}}" class=" row collapse">

                                    @else
                                        <div  style="width:100%;background-color: darkslategray;color: white" id="demo{{$hr->id}}" class="row collapse">

                                            @endif

                                            <div class="col">Room Type</div>
                                            <div class="col">Price</div>

                                        </div>

    @foreach($hr->Rooms->where('price','<>',0)->sortBy("room_type") as $rooms)
                                                    <div  id="demo{{$hr->id}}" class="row collapse">
                                                    <div class="col" style="border: 1px solid white"> {{DB::table('room_type')->where('id',$rooms->room_type)->value('type_name')}}</div>
                                                    <div class="col" style="border: 1px solid white"> {{$rooms->price}}</div>

                                                    </div>
                                            @endforeach

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

                        {{'Total Hotels:  '. $hotel_with_rooms->count() }}
                    </div>
                </div><!--col-->

                <!--col-->
            </div><!--row-->
        </div><!--card-body-->
    </div><!--card-->




@endsection
