
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title">Please select your desired package type and duration</h4>

            </div>
            <div class="modal-body">
                <form action="{{route('frontend.index')}}">
                    <div class="form-group">
                        Package Type:

                        <select name="package_type" id="" class="form-control" required>
                            <option value="">Select Package Type</option>
                            @foreach($packages as $p)
                                <option value="{{$p->id}}">{{$p->package_name}}</option>
                                @endforeach
                        </select>

                    </div>
                    <div class="form-group">
                        Package Duration:
                        <input type="number" min="1" max="100" name="package_days" class="form-control" placeholder="Enter your duration in days" required>
                    </div>
                  <div STYLE="text-align: center">

                      <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
            </div>
        </div>
    </div>
</div>




@extends('frontend.layouts.app')
@section('title', app_name() . ' | ' . __('navs.general.home'))
@section('content')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script>



        function get_route_vehical(route_id)
        {

            var vehical_id_js =document.getElementById(route_id+'selected_vehicals').value;


            document.cookie = "route_id="+route_id;
            document.cookie = "vehical_id_js="+vehical_id_js;

            var routeFare = document.getElementById(route_id+'fare')
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                method: 'get', // Type of response and matches what we said in the route
                url: '{{url('/fare')}}',
                dataType: "json",// This is the url we gave in the route
                data: {
                    _token: '{!! csrf_token() !!}',
                    vehical_id_js: vehical_id_js,
                    route_id: route_id
                }, // a JSON object to send back
                success: function(response){ // What to do if we succeed
                    console.log('ok');
                    // alert('Got Fare');
                    routeFare.value = JSON.parse(response.fare);
                },
                fail: function() { // What to do if we fail
                    console.log('fail');

                }
            });

            {{--routeFare.value={{$fare}};--}}

            console.log(document.cookie);

        }

        function setcheckoutdate_makkah(id)
        {
            document.getElementById('checkoutdate_makkah'+id).setAttribute("min",  document.getElementById('checkindate_makkah'+id).value);
        }

        function setcheckoutdate_madina(id)
        {
            document.getElementById('checkoutdate_madina'+id).setAttribute("min",  document.getElementById('checkindate_madina'+id).value);
        }
        function test_makkah(id)
        {
            var startDate = Date.parse(document.getElementById('checkindate_makkah'+id).value);
            var endDate = Date.parse(document.getElementById('checkoutdate_makkah'+id).value);
            var timeDiff = endDate - startDate;
            daysDiff = Math.floor(timeDiff / (1000 * 60 * 60 * 24));
            document.getElementById('totalnights_makkah'+id).value=daysDiff;
        }

        function test_madina(id)
        {
            var startDate = Date.parse(document.getElementById('checkindate_madina'+id).value);
            var endDate = Date.parse(document.getElementById('checkoutdate_madina'+id).value);
            var timeDiff = endDate - startDate;
            daysDiff = Math.floor(timeDiff / (1000 * 60 * 60 * 24));
            document.getElementById('totalnights_madina'+id).value=daysDiff;
        }

        function removerow_makkah(id)
        {

            var elem = document.getElementById("makkahhotel"+id);
            elem.remove();
        }

        function removerow_madina(id)
        {
            var elem = document.getElementById("madinahotel"+id);
            elem.remove();
        }


        $(document).ready(function () {

            $("#myModal").modal({
                show: false,
                backdrop: 'static'
            });

            $("#myModal").modal('show');

            $('#package_type').change(function () {

                var check=$('#package_type').val();


                if (check==4)
                {

                    console.log(<?php $makkah_hotel_db=DB::table('hotel')->where('location_id',1)->where('type_id',2)->get();
                        $madina_hotel_db=DB::table('hotel')->where('location_id',2)->where('type_id',2)->get();?>);
                }
                else
                {


                }



            });

            $('#add_routes_button').click(function () {
                $('#transportation_details').append('#transportation_details');
            });

            $('#ziarat_details').hide();
            $('#flight_details').hide();
            $('#transportation_details').hide();
            var makkah_hotel_count=0;
            var madina_hotel_count=0;

            $('#makkah_hotel').click(function () {
                makkah_hotel_count++;
                $('#toappendmakkah1').append("<div id='makkahhotel"+makkah_hotel_count+"'><div class='row'><div class='col-sm-4' >CheckIn Date<input class='form-control' onchange='setcheckoutdate_makkah("+makkah_hotel_count+")' type='datetime' min='{{date('Y-m-d')}}' name='checkindate_makkah"+makkah_hotel_count+"' id='checkindate_makkah"+makkah_hotel_count+"'>"+
                    "</div><div class='col-sm-4'>CheckOut Date<input class='form-control' type='date' onchange='test_makkah("+makkah_hotel_count+")' name='checkoutdate_makkah"+makkah_hotel_count+"' id='checkoutdate_makkah"+makkah_hotel_count+"'></div> <div class='col-sm-4'> Total Nights<input type='text'  class='form-control' id='totalnights_makkah"+makkah_hotel_count+"' name='totalnights_makkah[]'></div>"+
                    "</div><div class='row' ><div class='col-sm-3'>Select Makkah Hotel<select class='form-control' name='makkah_hotel[]'>@foreach($makkah_hotel_db as $mkh_db)<option value='{{$mkh_db->id}}'>{{$mkh_db->name}}</option>@endforeach</select></div> <div class='col-sm-3'>Select Room Type<select class='form-control' name='makkah_hotel_roomtype[]'>@foreach($room_type as $rt)<option value='{{$rt->id}}'>{{$rt->type_name}}</option>@endforeach</select></div><div class='col-sm-3'>No of rooms<input type='text' class='form-control' name='no_of_rooms_makkah[]'></div><div class='col-sm-3' style='border:1px solid transparent'>Delete This Record<button class='btn btn-danger form-control' type='button' onclick='removerow_makkah("+makkah_hotel_count+")'class=' float-right form-control'>Remove</button></div></div><hr></div>");
            });

            $('#makkah_hotel2').click(function () {
                makkah_hotel_count++;
                $('#toappendmakkah2').append("<div id='makkahhotel"+makkah_hotel_count+"'><div class='row'><div class='col-sm-4' >CheckIn Date<input class='form-control' type='date'  onchange='setcheckoutdate_makkah("+makkah_hotel_count+")'  min='{{date('Y-m-d')}}' name='checkindate_makkah"+makkah_hotel_count+"' id='checkindate_makkah"+makkah_hotel_count+"'>"+
                    "</div><div class='col-sm-4'>CheckOut Date<input class='form-control' type='date' onchange='test_makkah("+makkah_hotel_count+")' name='checkoutdate_makkah"+makkah_hotel_count+"' id='checkoutdate_makkah"+makkah_hotel_count+"'></div> <div class='col-sm-4'> Total Nights<input type='text' class='form-control' id='totalnights_makkah"+makkah_hotel_count+"' name='totalnights_makkah[]'></div>"+
                    "</div><div class='row' ><div class='col-sm-3'>Select Makkah Hotel<select class='form-control' name='makkah_hotel[]'>@foreach($makkah_hotel_db as $mkh_db)<option value='{{$mkh_db->id}}'>{{$mkh_db->name}}</option>@endforeach</select></div> <div class='col-sm-3'>Select Room Type<select class='form-control' name='makkah_hotel_roomtype[]'>@foreach($room_type as $rt)<option value='{{$rt->id}}'>{{$rt->type_name}}</option>@endforeach</select></div><div class='col-sm-3'>No of rooms<input type='text' class='form-control' name='no_of_rooms_makkah[]'></div><div class='col-sm-3' style='border:1px solid transparent'>Delete This Record<button class='btn btn-danger form-control' type='button' onclick='removerow_makkah("+makkah_hotel_count+")'class=' float-right form-control'>Remove</button></div></div><hr></div>");
            });

            $('#makkah_hotel3').click(function () {
                makkah_hotel_count++;
                $('#toappendmakkah3').append("<div id='makkahhotel"+makkah_hotel_count+"'><div class='row'><div class='col-sm-4' >CheckIn Date<input class='form-control' type='date'  onchange='setcheckoutdate_makkah("+makkah_hotel_count+")' min='{{date('Y-m-d')}}' name='checkindate_makkah"+makkah_hotel_count+"' id='checkindate_makkah"+makkah_hotel_count+"'>"+
                    "</div><div class='col-sm-4'>CheckOut Date<input class='form-control' type='date' onchange='test_makkah("+makkah_hotel_count+")' name='checkoutdate_makkah"+makkah_hotel_count+"' id='checkoutdate_makkah"+makkah_hotel_count+"'></div> <div class='col-sm-4'> Total Nights<input type='text' class='form-control' id='totalnights_makkah"+makkah_hotel_count+"' name='totalnights_makkah[]'></div>"+
                    "</div><div class='row' ><div class='col-sm-3'>Select Makkah Hotel<select class='form-control' name='makkah_hotel[]'>@foreach($makkah_hotel_db as $mkh_db)<option value='{{$mkh_db->id}}'>{{$mkh_db->name}}</option>@endforeach</select></div> <div class='col-sm-3'>Select Room Type<select class='form-control' name='makkah_hotel_roomtype[]'>@foreach($room_type as $rt)<option value='{{$rt->id}}'>{{$rt->type_name}}</option>@endforeach</select></div><div class='col-sm-3'>No of rooms<input type='text' class='form-control' name='no_of_rooms_makkah[]'></div><div class='col-sm-3' style='border:1px solid transparent'>Delete This Record<button class='btn btn-danger form-control' type='button' onclick='removerow_makkah("+makkah_hotel_count+")'class=' float-right form-control'>Remove</button></div></div><hr></div>");
            });


            $('#makkah_hotel4').click(function () {
                makkah_hotel_count++;
                $('#toappendmakkah4').append("<div id='makkahhotel"+makkah_hotel_count+"'><div class='row'><div class='col-sm-4' >CheckIn Date<input class='form-control' type='date'  onchange='setcheckoutdate_makkah("+makkah_hotel_count+")' min='{{date('Y-m-d')}}' name='checkindate_makkah"+makkah_hotel_count+"' id='checkindate_makkah"+makkah_hotel_count+"'>"+
                    "</div><div class='col-sm-4'>CheckOut Date<input class='form-control' type='date' onchange='test_makkah("+makkah_hotel_count+")' name='checkoutdate_makkah"+makkah_hotel_count+"' id='checkoutdate_makkah"+makkah_hotel_count+"'></div> <div class='col-sm-4'> Total Nights<input type='text' class='form-control' id='totalnights_makkah"+makkah_hotel_count+"' name='totalnights_makkah[]'></div>"+
                    "</div><div class='row' ><div class='col-sm-3'>Select Makkah Hotel<select class='form-control' name='makkah_hotel[]'>@foreach($makkah_hotel_db as $mkh_db)<option value='{{$mkh_db->id}}'>{{$mkh_db->name}}</option>@endforeach</select></div> <div class='col-sm-3'>Select Room Type<select class='form-control' name='makkah_hotel_roomtype[]'>@foreach($room_type as $rt)<option value='{{$rt->id}}'>{{$rt->type_name}}</option>@endforeach</select></div><div class='col-sm-3'>No of rooms<input type='text' class='form-control' name='no_of_rooms_makkah[]'></div><div class='col-sm-3' style='border:1px solid transparent'>Delete This Record<button class='btn btn-danger form-control' type='button' onclick='removerow_makkah("+makkah_hotel_count+")'class=' float-right form-control'>Remove</button></div></div><hr></div>");
            });0

            $('#makkah_hotel5').click(function () {
                makkah_hotel_count++;
                $('#toappendmakkah5').append("<div id='makkahhotel"+makkah_hotel_count+"'><div class='row'><div class='col-sm-4' >CheckIn Date<input class='form-control' type='date'  onchange='setcheckoutdate_makkah("+makkah_hotel_count+")' min='{{date('Y-m-d')}}' name='checkindate_makkah"+makkah_hotel_count+"' id='checkindate_makkah"+makkah_hotel_count+"'>"+
                    "</div><div class='col-sm-4'>CheckOut Date<input class='form-control' type='date' onchange='test_makkah("+makkah_hotel_count+")' id='checkoutdate_makkah"+makkah_hotel_count+"' name='checkoutdate_makkah"+makkah_hotel_count+"'></div> <div class='col-sm-4'> Total Nights<input type='text' class='form-control' id='totalnights_makkah"+makkah_hotel_count+"' name='totalnights_makkah[]'></div>"+
                    "</div><div class='row' ><div class='col-sm-3'>Select Makkah Hotel<select class='form-control' name='makkah_hotel[]'>@foreach($makkah_hotel_db as $mkh_db)<option value='{{$mkh_db->id}}'>{{$mkh_db->name}}</option>@endforeach</select></div> <div class='col-sm-3'>Select Room Type<select class='form-control' name='makkah_hotel_roomtype[]'>@foreach($room_type as $rt)<option value='{{$rt->id}}'>{{$rt->type_name}}</option>@endforeach</select></div><div class='col-sm-3'>No of rooms<input type='text' class='form-control' name='no_of_rooms_makkah[]'></div><div class='col-sm-3' style='border:1px solid transparent'>Delete This Record<button class='btn btn-danger form-control' type='button' onclick='removerow_makkah("+makkah_hotel_count+")'class=' float-right form-control'>Remove</button></div></div><hr></div>");
            });

            $('#madina_hotel1').click(function () {
                madina_hotel_count++;
                $('#toappendmadina1').append("<div id='madinahotel"+madina_hotel_count+"'><div class='row'><div class='col-sm-4' >CheckIn Date<input class='form-control' type='date' onchange='setcheckoutdate_madina("+madina_hotel_count+")' type='date' min='{{date('Y-m-d')}}' name='checkindate_madina"+madina_hotel_count+"' id='checkindate_madina"+madina_hotel_count+"'>"+
                    "</div><div class='col-sm-4'>CheckOut Date<input class='form-control' type='date' onchange='test_madina("+madina_hotel_count+")' name='checkoutdate_madina"+madina_hotel_count+"' id='checkoutdate_madina"+madina_hotel_count+"'></div> <div class='col-sm-4'> Total Nights<input type='text' class='form-control' id='totalnights_madina"+madina_hotel_count+"' name='totalnights_madina[]' ></div>"+
                    "</div><div class='row' ><div class='col-sm-3'>Select Madina Hotel<select class='form-control' name='madina_hotel[]'>@foreach($madina_hotel_db as $md_db)<option value='{{$md_db->id}}'>{{$md_db->name}}</option>@endforeach</select></div> <div class='col-sm-3'>Select Room Type<select class='form-control' name='madina_hotel_roomtype[]'>@foreach($room_type as $rt)<option value='{{$rt->id}}'>{{$rt->type_name}}</option>@endforeach</select></div><div class='col-sm-3'>No of rooms<input type='text' class='form-control' name='no_of_rooms_madina[]'></div><div class='col-sm-3' style='border:1px solid transparent'>Delete This Record<button class='btn btn-danger form-control' type='button' onclick='removerow_madina("+madina_hotel_count+")'class=' float-right form-control'>Remove</button></div></div><hr></div>");

            });

            $('#madina_hotel2').click(function () {

                madina_hotel_count++;
                $('#toappendmadina2').append("<div id='madinahotel"+madina_hotel_count+"'><div class='row'><div class='col-sm-4' >CheckIn Date<input class='form-control' type='date' onchange='setcheckoutdate_madina("+madina_hotel_count+")' min='{{date('Y-m-d')}}' name='checkindate_madina"+madina_hotel_count+"' id='checkindate_madina"+madina_hotel_count+"'>"+
                    "</div><div class='col-sm-4'>CheckOut Date<input class='form-control' type='date' onchange='test_madina("+madina_hotel_count+")' name='checkoutdate_madina"+madina_hotel_count+"' id='checkoutdate_madina"+madina_hotel_count+"'></div> <div class='col-sm-4'> Total Nights<input type='text' class='form-control' id='totalnights_madina"+madina_hotel_count+"' name='totalnights_madina[]' ></div>"+
                    "</div><div class='row' ><div class='col-sm-3'>Select Madina Hotel<select class='form-control' name='madina_hotel[]'>@foreach($madina_hotel_db as $md_db)<option value='{{$md_db->id}}'>{{$md_db->name}}</option>@endforeach</select></div> <div class='col-sm-3'>Select Room Type<select class='form-control' name='madina_hotel_roomtype[]'>@foreach($room_type as $rt)<option value='{{$rt->id}}'>{{$rt->type_name}}</option>@endforeach</select></div><div class='col-sm-3'>No of rooms<input type='text' class='form-control' name='no_of_rooms_madina[]'></div><div class='col-sm-3' style='border:1px solid transparent'>Delete This Record<button class='btn btn-danger form-control' type='button' onclick='removerow_madina("+madina_hotel_count+")'class=' float-right form-control'>Remove</button></div></div><hr></div>");

            });

            $('#madina_hotel3').click(function () {

                madina_hotel_count++;
                $('#toappendmadina3').append("<div id='madinahotel"+madina_hotel_count+"'><div class='row'><div class='col-sm-4' >CheckIn Date<input class='form-control' type='date' onchange='setcheckoutdate_madina("+madina_hotel_count+")' min='{{date('Y-m-d')}}' name='checkindate_madina"+madina_hotel_count+"' id='checkindate_madina"+madina_hotel_count+"'>"+
                    "</div><div class='col-sm-4'>CheckOut Date<input class='form-control' type='date' onchange='test_madina("+madina_hotel_count+")' name='checkoutdate_madina"+madina_hotel_count+"' id='checkoutdate_madina"+madina_hotel_count+"'></div> <div class='col-sm-4'> Total Nights<input type='text' class='form-control' id='totalnights_madina"+madina_hotel_count+"' name='totalnights_madina[]' ></div>"+
                    "</div><div class='row' ><div class='col-sm-3'>Select Madina Hotel<select class='form-control' name='madina_hotel[]'>@foreach($madina_hotel_db as $md_db)<option value='{{$md_db->id}}'>{{$md_db->name}}</option>@endforeach</select></div> <div class='col-sm-3'>Select Room Type<select class='form-control' name='madina_hotel_roomtype[]'>@foreach($room_type as $rt)<option value='{{$rt->id}}'>{{$rt->type_name}}</option>@endforeach</select></div><div class='col-sm-3'>No of rooms<input type='text' class='form-control' name='no_of_rooms_madina[]'></div><div class='col-sm-3' style='border:1px solid transparent'>Delete This Record<button class='btn btn-danger form-control' type='button' onclick='removerow_madina("+madina_hotel_count+")'class=' float-right form-control'>Remove</button></div></div><hr></div>");

            });


            $('#madina_hotel4').click(function () {

                madina_hotel_count++;
                $('#toappendmadina4').append("<div id='madinahotel"+madina_hotel_count+"'><div class='row'><div class='col-sm-4' >CheckIn Date<input class='form-control' type='date' onchange='setcheckoutdate_madina("+madina_hotel_count+")' min='{{date('Y-m-d')}}' name='checkindate_madina"+madina_hotel_count+"' id='checkindate_madina"+madina_hotel_count+"'>"+
                    "</div><div class='col-sm-4'>CheckOut Date<input class='form-control' type='date' onchange='test_madina("+madina_hotel_count+")' name='checkoutdate_madina"+madina_hotel_count+"' id='checkoutdate_madina"+madina_hotel_count+"'></div> <div class='col-sm-4'> Total Nights<input type='text' class='form-control' id='totalnights_madina"+madina_hotel_count+"' name='totalnights_madina[]' ></div>"+
                    "</div><div class='row' ><div class='col-sm-3'>Select Madina Hotel<select class='form-control' name='madina_hotel[]'>@foreach($madina_hotel_db as $md_db)<option value='{{$md_db->id}}'>{{$md_db->name}}</option>@endforeach</select></div> <div class='col-sm-3'>Select Room Type<select class='form-control' name='madina_hotel_roomtype[]'>@foreach($room_type as $rt)<option value='{{$rt->id}}'>{{$rt->type_name}}</option>@endforeach</select></div><div class='col-sm-3'>No of rooms<input type='text' class='form-control' name='no_of_rooms_madina[]'></div><div class='col-sm-3' style='border:1px solid transparent'>Delete This Record<button class='btn btn-danger form-control' type='button' onclick='removerow_madina("+madina_hotel_count+")'class=' float-right form-control'>Remove</button></div></div><hr></div>");

            });

            $('#madina_hotel5').click(function () {

                madina_hotel_count++;
                $('#toappendmadina5').append("<div id='madinahotel"+madina_hotel_count+"'><div class='row'><div class='col-sm-4' >CheckIn Date<input class='form-control' type='date' onchange='setcheckoutdate_madina("+madina_hotel_count+")' min='{{date('Y-m-d')}}' name='checkindate_madina"+madina_hotel_count+"' id='checkindate_madina"+madina_hotel_count+"'>"+
                    "</div><div class='col-sm-4'>CheckOut Date<input class='form-control' type='date' onchange='test_madina("+madina_hotel_count+")' name='checkoutdate_madina"+madina_hotel_count+"' id='checkoutdate_madina"+madina_hotel_count+"'></div> <div class='col-sm-4'> Total Nights<input type='text' class='form-control' id='totalnights_madina"+madina_hotel_count+"' name='totalnights_madina[]' ></div>"+
                    "</div><div class='row' ><div class='col-sm-3'>Select Madina Hotel<select class='form-control' name='madina_hotel[]'>@foreach($madina_hotel_db as $md_db)<option value='{{$md_db->id}}'>{{$md_db->name}}</option>@endforeach</select></div> <div class='col-sm-3'>Select Room Type<select class='form-control' name='madina_hotel_roomtype[]'>@foreach($room_type as $rt)<option value='{{$rt->id}}'>{{$rt->type_name}}</option>@endforeach</select></div><div class='col-sm-3'>No of rooms<input type='text' class='form-control' name='no_of_rooms_madina[]'></div><div class='col-sm-3' style='border:1px solid transparent'>Delete This Record<button class='btn btn-danger form-control' type='button' onclick='removerow_madina("+madina_hotel_count+")'class=' float-right form-control'>Remove</button></div></div><hr></div>");

            });
            $('#4').hide();
            $('#2').hide();
            $('#3').hide();
            $('#1').hide();
            $('#routeid').change(function () {

                if($('#routeid').val()==1)
                {
                    $('#1').show();
                    $('#2').hide();
                    $('#3').hide();
                    $('#4').hide();
                }
                if($('#routeid').val()==2)
                {
                    $('#2').show();

                    $('#1').hide();
                    $('#3').hide();
                    $('#4').hide();
                }
                if($('#routeid').val()==3)
                {
                    $('#3').show();
                    $('#1').hide();
                    $('#2').hide();
                    $('#4').hide();
                }
                if($('#routeid').val()==4)
                {
                    $('#4').show();
                    $('#2').hide();
                    $('#3').hide();
                    $('#1').hide();
                }


            });

            $('.ziarat_checkbox').on('change', function(){ // on change of state
                if(this.checked) // if changed state is "CHECKED"
                {
                    // do the magic here
                    $('#ziarat_details').show();

                }
                else
                {
                    $('#ziarat_details').hide();
                }
            });


            $('.flight_checkbox').on('change', function(){ // on change of state
                if(this.checked) // if changed state is "CHECKED"
                {

                    // do the magic here
                    $('#flight_details').show();

                }
                else
                {
                    $('#flight_details').hide();
                }
            });



            $('#transportation_checkbox').on('change', function(){ // on change of state
                if(this.checked) // if changed state is "CHECKED"
                {
                    // do the magic here
                    $('#transportation_details').show();

                }
                else
                {
                    $('#transportation_details').hide();
                }
            });
        });
    </script>











    <form class="form-horizontal" action="{{route('frontend.formrule')}}" method="get" style="border: 1px solid black;padding: 10px;">
        @csrf
        <h3>Family Information</h3>
        <div class="row">
            <label class="control-label col-sm-2" for="email">Family Name:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="email" placeholder="Enter family name" name="family_name">
            </div>
        </div>




        <div class="row">
            <label class="control-label col-sm-2" for="email">Contact No</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="email" placeholder="Enter contact" name="contact">
            </div>
        </div>




        <div class="row">
            <label class="control-label col-sm-2" for="email">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
            </div>
        </div>


{{--        <hr>--}}
        <h3 style="display: none">Package Details</h3>
        <div class="row" style="display: none">
            <div class="col-sm-6">
                <label class="control-label" for="email">Package Type:</label>
                <select name="package_type" id="package_type" class="form-control">
                    @foreach($packages as $p)
                        <option value="{{$p->id}}">{{$p->package_name}}</option>
                    @endforeach

                </select>
            </div>

            <div class="col-sm-6">
                <label class="control-label " for="email">Package Duration:</label>
                <input type="number" class="form-control" name="package_duration" >
            </div>
        </div>
        <hr>

        <h3>Visa</h3>
        <div class="row">
            <div class="col-sm-4">
                <label class="control-label " for="email">Adults:</label>
                <select name="visa_adult" id="" class="form-control">
                    <?php for($i=0;$i<=30;$i++)
                    {?>

                    <option value="{{$i}}">
                        {{$i}}
                    </option>
                    <?php
                    }
                    ?>
                </select>
            </div>

            <div class="col-sm-4">
                <label class="control-label " for="email">Children:</label>
                <select name="visa_child" id="" class="form-control">
                    <?php for($i=0;$i<=30;$i++)
                    {?>
                    <option value="{{$i}}">
                        {{$i}}
                    </option>
                    <?php
                    }
                    ?>
                </select>
            </div>

            <div class="col-sm-4">
                <label class="control-label " for="email">Infants:</label>
                <select name="visa_infant" id="" class="form-control">
                    <?php for($i=0;$i<=30;$i++)
                    {?>

                    <option value="{{$i}}">
                        {{$i}}
                    </option>
                    <?php
                    }
                    ?>
                </select>
            </div>


        </div>

        <hr>
        <h3>Accomodation</h3>
        <div class="row">

            <div class="col-sm-12">
                <label class="control-label " for="email">Select Travel Route:</label>
                <select name="routeid" id="routeid" class="form-control">
                    <option value=""> Select Route</option>
                    <option value="1">
                        Makkah-Madina-Makkah
                    </option>
                    <option value="2">
                        Madina-Makkah-Madina
                    </option>
                    <option value="3">
                        Madina-Makkah
                    </option>
                    <option value="4">
                        Makkah-Madina
                    </option>
                </select>
            </div>
        </div>

        <hr>
        <div id="1">
            <div class="row">

                <div class="col-sm-12">
                    <button type="button" class="btn btn-primary float-right" id="makkah_hotel">Add Hotel</button>
                    <h3>Stay In Makkah</h3>

                    <div id="toappendmakkah1">

                    </div>
                </div>
            </div>


            <div class="row">

                <div class="col-sm-12">
                    <button type="button" class="btn btn-primary float-right" id="madina_hotel1">Add Hotel</button>
                    <h3>Stay In Madina</h3>

                    <div id="toappendmadina1">

                    </div>

                </div>
            </div>


            <div class="row">

                <div class="col-sm-12">
                    <button type="button" class="btn btn-primary float-right" id="makkah_hotel2">Add Hotel</button>
                    <h3>Stay In Makkah</h3>

                    <div id="toappendmakkah2">

                    </div>
                </div>
            </div>
        </div>

        <div id="2">

            <div class="row">

                <div class="col-sm-12">
                    <button type="button" class="btn btn-primary float-right" id="madina_hotel2">Add Hotel</button>
                    <h3>Stay In Madina</h3>

                    <div id="toappendmadina2">

                    </div>

                </div>
            </div>

            <div class="row">

                <div class="col-sm-12">
                    <button type="button" class="btn btn-primary float-right" id="makkah_hotel3">Add Hotel</button>
                    <h3>Stay In Makkah</h3>

                    <div id="toappendmakkah3">

                    </div>
                </div>
            </div>


            <div class="row">

                <div class="col-sm-12">
                    <button type="button" class="btn btn-primary float-right" id="madina_hotel3">Add Hotel</button>
                    <h3>Stay In Madina</h3>

                    <div id="toappendmadina3">

                    </div>

                </div>
            </div>

        </div>

        <div id="3">
            <div class="row">

                <div class="col-sm-12">
                    <button type="button" class="btn btn-primary float-right" id="madina_hotel4">Add Hotel</button>
                    <h3>Stay In Madina</h3>

                    <div id="toappendmadina4">

                    </div>

                </div>
            </div>

            <div class="row">

                <div class="col-sm-12">
                    <button type="button" class="btn btn-primary float-right" id="makkah_hotel4">Add Hotel</button>
                    <h3>Stay In Makkah</h3>

                    <div id="toappendmakkah4">

                    </div>
                </div>
            </div>

        </div>

        <div id="4">
            <div class="row">

                <div class="col-sm-12">
                    <button type="button" class="btn btn-primary float-right" id="makkah_hotel5">Add Hotel</button>
                    <h3>Stay In Makkah</h3>

                    <div id="toappendmakkah5">

                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-sm-12">
                    <button type="button" class="btn btn-primary float-right" id="madina_hotel5">Add Hotel</button>
                    <h3>Stay In Madina</h3>

                    <div id="toappendmadina5">

                    </div>

                </div>
            </div>


        </div>




        <h4>Transport</h4>
        <div class="row">
            <div class="col-sm-12">
                Do you want to include private transport?
                Yes <input type="checkbox" id="transportation_checkbox">


                <div id="transportation_details">
                    {{--                        <button class="btn btn-success" type="button" id="add_routes_button">Add more routes</button>--}}

                    <u>Please Select Your Desire Route</u>
                    <h4>Select Route:</h4>
                    {{--                                <select name="selected_routes" id="" class="form-control">--}}
                    {{--                                    @foreach($routes as $r)--}}
                    {{--                                        <option value="{{$r->id}}">{{$r->route}}</option>--}}
                    {{--                                    @endforeach--}}

                    {{--                                </select>--}}

                    @foreach($routes as $r)
                        <div class="row">

                            <div class="col-sm-4">
                                <input name="transport_route[]" type="checkbox" value="{{$r->id}}">  {{$r->route}}
                            </div>
                            <?php $vehical_route=DB::table('vehical_routes_fairs')->where('route_id',$r->id)->where('fare','<>',0)->pluck('vehical_id')->toArray();?>
                            <div class="col-sm-4">
                                <select name="selected_vehicals[]" id="{{$r->id}}selected_vehicals" class="form-control" onchange='get_route_vehical({{$r->id}})'>
                                    <option value="">Select Vehicle</option>
                                    @foreach($vehical as $v)
                                        @if(in_array($v->id, $vehical_route))

                                            <option value="{{$v->id}}">{{$v->name}}</option>

                                        @endif

                                    @endforeach
                                </select>
                            </div>



                            <div class="col-sm-4">
                                Fare:<input type="text" disabled class="form-control" id="{{$r->id.'fare'}}">
                            </div>
                        </div>
                    @endforeach





                </div>


            </div>
        </div>


        <hr>
        <div class="row">
            <div class="col-sm-12">
                <h3>Ziarat</h3>
                Do You want to include ziarat in Makkah & Madina?
                Yes <input type="checkbox" class="ziarat_checkbox">


                <div id="ziarat_details">
                    Ziarat Price:
                    <input type="text" disabled value="{{$ziarat_price}}"  class="form-control">
                    Enter total persons:
                    <input type="text" name="persons_for_ziarat"  class="form-control">

                </div>
            </div>
        </div>

        <hr>
        <div class="row">


            <div class="col-sm-12">

                <h3>Flight</h3>
                Do You want to include airticket in your package?
                Yes <input type="checkbox"  class="flight_checkbox" name="flight_checkbox">

                <div id="flight_details">

                    Please Enter Your Flight  Details:
                    {{--                        <input type="text" disabled value="{{$ziarat_price}}"  class="form-control">--}}
                    {{--                        Enter total persons:--}}
                    {{--                        <input type="text" name="persons_for_ziarat"  class="form-control">--}}

                    <div class="row">

                        <div class="col">
                            Select Airline<select name="AirLine" id=""  class="form-control">
                                <option value="PIA">PIA</option>
                                <option value="Qatar Airways">Qatar Airways</option>
                                <option value="Etihaad Airways">Etihaad Airways</option>
                                <option value="Oman Ai">Oman Air</option>
                                <option value="Emirates">Emirates</option>
                            </select>
                        </div>
                        <div class="col">
                            Departure Date
                            <input type="date"  name="departure_date_air" class="form-control">
                        </div>
                        <div class="col">

                            Arrival Date
                            <input type="date" name="arriaval_date_air" class="form-control">

                        </div>
                    </div>




                    <div class="row">
                        <div class="col">
                            Number of adults<select name="air_adult" id=""  class="form-control"> <?php for($i=0;$i<=30;$i++)
                                {?>

                                <option value="{{$i}}">
                                    {{$i}}
                                </option>
                                <?php
                                }
                                ?></select>
                        </div>
                        <div class="col">
                            Number of children<select name="air_children" id=""   class="form-control"> <?php for($i=0;$i<=30;$i++)
                                {?>

                                <option value="{{$i}}">
                                    {{$i}}
                                </option>
                                <?php
                                }
                                ?></select>
                        </div>
                        <div class="col">
                            Number of infants<select name="air_infant" id=""  class="form-control"> <?php for($i=0;$i<=30;$i++)
                                {?>

                                <option value="{{$i}}">
                                    {{$i}}
                                </option>
                                <?php
                                }
                                ?></select>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col">
                            Adult Ticket Price<input name="adult_air_price" type="text" class="form-control">
                        </div>
                        <div class="col">
                            Child Ticket Price<input name="child_air_price" type="text" class="form-control">
                        </div>
                        <div class="col">
                            Infant Ticket Price<input name="infant_air_price" type="text" class="form-control">
                        </div>
                    </div>


                </div>

            </div>




        </div>




        <button type="submit" class="btn btn-primary" style="margin-left: 420px;width: 250px;margin-top: 50px">Calculate Fare</button>
    </form>


@endsection

