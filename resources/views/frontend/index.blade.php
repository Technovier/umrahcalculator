@extends('frontend.layouts.app')
@section('title', app_name() . ' | ' . __('navs.general.home'))
@section('content')
    <style>


        body{

            background-image: url("{{asset('img/frontend/backimg.jpg')}}");
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script>

        var packagedays='<?php echo $packagedays;?>';
        var globalcheck=0;

        var makkah_hotel_count=0;
        var madina_hotel_count=0;
        $(document).ready(function () {



            $(":input").inputmask();
            $("#contact").inputmask({"mask": "0399-9999999"});

            {{--$('#departure_date_air').datepicker();--}}
            {{--$('#arriaval_date_air').datepicker();--}}
            {{--$('#departure_date_air').datepicker('setStartDate', '{{date('d/m/y')}}');--}}



            {{--$('#departure_date_air')--}}
            {{--    .datepicker()--}}
            {{--    .on('changeDate', function(ev){--}}
            {{--        // if (ev.date.valueOf() < date-start-display.valueOf()){--}}
            {{--        // ....--}}
            {{--        // }--}}
            {{--        var newDate = new Date(ev.date)--}}
            {{--        newDate.setDate(newDate.getDate() + 1);--}}

            {{--        console.log(newDate);--}}

            {{--        $('#arriaval_date_air').datepicker('setStartDate', newDate);--}}

            {{--    });--}}

            $("#myModal").modal('show');
            $('#add_routes_button').click(function () {
                $('#transportation_details').append('#transportation_details');
            });

            $('#ziarat_details').hide();
            $('#flight_details').hide();
            $('#transportation_details').hide();


            $('#makkah_hotel').click(function () {
                makkah_hotel_count++;
                $('#toappendmakkah1').append("<div id='makkahhotel"+makkah_hotel_count+"'><div class='row'><div class='col-sm-4' >CheckIn Date<input class='form-control' onchange='setcheckoutdate_makkah("+makkah_hotel_count+")' required type='date' min='{{date('Y-m-d')}}' name='checkindate_makkah"+makkah_hotel_count+"' id='checkindate_makkah"+makkah_hotel_count+"'>"+
                    "</div><div class='col-sm-4'>CheckOut Date<input class='form-control' type='date' required onchange='test_makkah("+makkah_hotel_count+")' name='checkoutdate_makkah"+makkah_hotel_count+"' id='checkoutdate_makkah"+makkah_hotel_count+"'></div> <div class='col-sm-4'> Total Nights<input type='number' class='form-control' id='totalnights_makkah"+makkah_hotel_count+"' name='totalnights_makkah[]' ></div>"+
                    "</div><div class='row' ><div class='col-sm-6'>Select Makkah Hotel<select class='form-control' name='makkah_hotel[]' id='makkahhotelname"+makkah_hotel_count+"' required><option>Select Hotel</option>@foreach($makkah_hotel_db as $mkh_db)<option value='{{$mkh_db->id}}'>{{$mkh_db->name}} ({{$mkh_db->distance}})</option>@endforeach</select></div> <div class='col-sm-2'>Select Room Type<select required class='form-control' name='makkah_hotel_roomtype[]' id='makkahroomtype"+makkah_hotel_count+"' onchange='getmakkahroomfare("+makkah_hotel_count+")'><option>Select Type</option>@foreach($room_type as $rt)<option value='{{$rt->id}}'>{{$rt->type_name}}</option>@endforeach</select></div><div class='col-sm-2'>Fare Per Night(SR)<label class='form-control' id='makkahpricelabel"+makkah_hotel_count+"'></label></div><div class='col-sm-2'>No of rooms<input required type='number' class='form-control' name='no_of_rooms_makkah[]'></div></div><div class='row' style='border:1px solid transparent;text-align:right;'> <div class='col'><button class='btn btn-sm btn-danger' type='button' onclick='removerow_makkah("+makkah_hotel_count+")'>Remove</button></div></div><hr></div>");

            });

            $('#makkah_hotel2').click(function () {
                makkah_hotel_count++;
                $('#toappendmakkah2').append("<div id='makkahhotel"+makkah_hotel_count+"'><div class='row'><div class='col-sm-4' >CheckIn Date<input class='form-control' onchange='setcheckoutdate_makkah("+makkah_hotel_count+")' required type='date' min='{{date('Y-m-d')}}' name='checkindate_makkah"+makkah_hotel_count+"' id='checkindate_makkah"+makkah_hotel_count+"'>"+
                    "</div><div class='col-sm-4'>CheckOut Date<input class='form-control' required type='date' onchange='test_makkah("+makkah_hotel_count+")' name='checkoutdate_makkah"+makkah_hotel_count+"' id='checkoutdate_makkah"+makkah_hotel_count+"'></div> <div class='col-sm-4'> Total Nights<input type='number' class='form-control' id='totalnights_makkah"+makkah_hotel_count+"' name='totalnights_makkah[]' ></div>"+
                    "</div><div class='row' ><div class='col-sm-6'>Select Makkah Hotel<select required class='form-control' name='makkah_hotel[]' id='makkahhotelname"+makkah_hotel_count+"'><option>Select Hotel</option>@foreach($makkah_hotel_db as $mkh_db)<option value='{{$mkh_db->id}}'>{{$mkh_db->name}} ({{$mkh_db->distance}})</option>@endforeach</select></div> <div class='col-sm-2'>Select Room Type<select required class='form-control' name='makkah_hotel_roomtype[]' id='makkahroomtype"+makkah_hotel_count+"' onchange='getmakkahroomfare("+makkah_hotel_count+")'><option>Select Type</option>@foreach($room_type as $rt)<option value='{{$rt->id}}'>{{$rt->type_name}}</option>@endforeach</select></div><div class='col-sm-2'>Fare Per Night(SR)<label class='form-control' id='makkahpricelabel"+makkah_hotel_count+"'></label></div><div class='col-sm-2'>No of rooms<input required type='number' class='form-control' name='no_of_rooms_makkah[]'></div></div><div class='row' style='border:1px solid transparent;text-align:right;'> <div class='col'><button class='btn btn-sm btn-danger' type='button' onclick='removerow_makkah("+makkah_hotel_count+")'>Remove</button></div></div><hr></div>");

            });

            $('#makkah_hotel3').click(function () {
                makkah_hotel_count++;
                $('#toappendmakkah3').append("<div id='makkahhotel"+makkah_hotel_count+"'><div class='row'><div class='col-sm-4' >CheckIn Date<input class='form-control'  required onchange='setcheckoutdate_makkah("+makkah_hotel_count+")' type='date' min='{{date('Y-m-d')}}' name='checkindate_makkah"+makkah_hotel_count+"' id='checkindate_makkah"+makkah_hotel_count+"'>"+
                    "</div><div class='col-sm-4'>CheckOut Date<input class='form-control' required type='date' onchange='test_makkah("+makkah_hotel_count+")' name='checkoutdate_makkah"+makkah_hotel_count+"' id='checkoutdate_makkah"+makkah_hotel_count+"'></div> <div class='col-sm-4'> Total Nights<input type='number' class='form-control' id='totalnights_makkah"+makkah_hotel_count+"' name='totalnights_makkah[]' ></div>"+
                    "</div><div class='row' ><div class='col-sm-6'>Select Makkah Hotel<select required class='form-control' name='makkah_hotel[]' id='makkahhotelname"+makkah_hotel_count+"'><option>Select Hotel</option>@foreach($makkah_hotel_db as $mkh_db)<option value='{{$mkh_db->id}}'>{{$mkh_db->name}} ({{$mkh_db->distance}})</option>@endforeach</select></div> <div class='col-sm-2'>Select Room Type<select required class='form-control' name='makkah_hotel_roomtype[]' id='makkahroomtype"+makkah_hotel_count+"' onchange='getmakkahroomfare("+makkah_hotel_count+")'><option>Select Type</option>@foreach($room_type as $rt)<option value='{{$rt->id}}'>{{$rt->type_name}}</option>@endforeach</select></div><div class='col-sm-2'>Fare Per Night(SR)<label class='form-control' id='makkahpricelabel"+makkah_hotel_count+"'></label></div><div class='col-sm-2'>No of rooms<input required type='number' class='form-control' name='no_of_rooms_makkah[]'></div></div><div class='row' style='border:1px solid transparent;text-align:right;'> <div class='col'><button class='btn btn-sm btn-danger' type='button' onclick='removerow_makkah("+makkah_hotel_count+")'>Remove</button></div></div><hr></div>");

            });


            $('#makkah_hotel4').click(function () {
                makkah_hotel_count++;
                $('#toappendmakkah4').append("<div id='makkahhotel"+makkah_hotel_count+"'><div class='row'><div class='col-sm-4' >CheckIn Date<input class='form-control' required onchange='setcheckoutdate_makkah("+makkah_hotel_count+")' type='date' min='{{date('Y-m-d')}}' name='checkindate_makkah"+makkah_hotel_count+"' id='checkindate_makkah"+makkah_hotel_count+"'>"+
                    "</div><div class='col-sm-4'>CheckOut Date<input class='form-control' required type='date' onchange='test_makkah("+makkah_hotel_count+")' name='checkoutdate_makkah"+makkah_hotel_count+"' id='checkoutdate_makkah"+makkah_hotel_count+"'></div> <div class='col-sm-4'> Total Nights<input type='number' class='form-control' id='totalnights_makkah"+makkah_hotel_count+"' name='totalnights_makkah[]' ></div>"+
                    "</div><div class='row' ><div class='col-sm-6'>Select Makkah Hotel<select required class='form-control' name='makkah_hotel[]' id='makkahhotelname"+makkah_hotel_count+"'><option>Select Hotel</option>@foreach($makkah_hotel_db as $mkh_db)<option value='{{$mkh_db->id}}'>{{$mkh_db->name}} ({{$mkh_db->distance}})</option>@endforeach</select></div> <div class='col-sm-2'>Select Room Type<select required class='form-control' name='makkah_hotel_roomtype[]' id='makkahroomtype"+makkah_hotel_count+"' onchange='getmakkahroomfare("+makkah_hotel_count+")' ><option>Select Type</option>@foreach($room_type as $rt)<option value='{{$rt->id}}'>{{$rt->type_name}}</option>@endforeach</select></div><div class='col-sm-2'>Fare Per Night(SR)<label class='form-control' id='makkahpricelabel"+makkah_hotel_count+"'></label></div><div class='col-sm-2'>No of rooms<input required type='number' class='form-control' name='no_of_rooms_makkah[]'></div></div><div class='row' style='border:1px solid transparent;text-align:right;'> <div class='col'><button class='btn btn-sm btn-danger' type='button' onclick='removerow_makkah("+makkah_hotel_count+")'>Remove</button></div></div><hr></div>");


            });

            $('#makkah_hotel5').click(function () {
                makkah_hotel_count++;
                $('#toappendmakkah5').append("<div id='makkahhotel"+makkah_hotel_count+"'><div class='row'><div class='col-sm-4' >CheckIn Date<input class='form-control' required onchange='setcheckoutdate_makkah("+makkah_hotel_count+")' type='date' min='{{date('Y-m-d')}}' name='checkindate_makkah"+makkah_hotel_count+"' id='checkindate_makkah"+makkah_hotel_count+"'>"+
                    "</div><div class='col-sm-4'>CheckOut Date<input required class='form-control' type='date' onchange='test_makkah("+makkah_hotel_count+")' name='checkoutdate_makkah"+makkah_hotel_count+"' id='checkoutdate_makkah"+makkah_hotel_count+"'></div> <div class='col-sm-4'> Total Nights<input type='number' class='form-control' id='totalnights_makkah"+makkah_hotel_count+"' name='totalnights_makkah[]' ></div>"+
                    "</div><div class='row' ><div class='col-sm-6'>Select Makkah Hotel<select required class='form-control' name='makkah_hotel[]' id='makkahhotelname"+makkah_hotel_count+"'><option>Select Hotel</option>@foreach($makkah_hotel_db as $mkh_db)<option value='{{$mkh_db->id}}'>{{$mkh_db->name}} ({{$mkh_db->distance}})</option>@endforeach</select></div> <div class='col-sm-2'>Select Room Type<select required class='form-control' id='makkahroomtype"+makkah_hotel_count+"' onchange='getmakkahroomfare("+makkah_hotel_count+")' name='makkah_hotel_roomtype[]'><option>Select Type</option>@foreach($room_type as $rt)<option value='{{$rt->id}}'>{{$rt->type_name}}</option>@endforeach</select></div><div class='col-sm-2'>Fare Per Night(SR)<label class='form-control' id='makkahpricelabel"+makkah_hotel_count+"'></label></div><div class='col-sm-2'>No of rooms<input required type='number' class='form-control' name='no_of_rooms_makkah[]'></div></div><div class='row' style='border:1px solid transparent;text-align:right;'> <div class='col'><button class='btn btn-sm btn-danger' type='button' onclick='removerow_makkah("+makkah_hotel_count+")'>Remove</button></div></div><hr></div>");


            });

            $('#madina_hotel1').click(function () {

                madina_hotel_count++;
                $('#toappendmadina1').append("<div id='madinahotel"+madina_hotel_count+"'><div class='row'><div class='col-sm-4' >CheckIn Date<input class='form-control' onchange='setcheckoutdate_madina("+madina_hotel_count+")' required type='date' min='{{date('Y-m-d')}}' name='checkindate_madina"+madina_hotel_count+"' id='checkindate_madina"+madina_hotel_count+"'>"+
                    "</div><div class='col-sm-4'>CheckOut Date<input class='form-control' required type='date' onchange='test_madina("+madina_hotel_count+")' name='checkoutdate_madina"+madina_hotel_count+"' required id='checkoutdate_madina"+madina_hotel_count+"'></div> <div class='col-sm-4'> Total Nights<input type='number' class='form-control' id='totalnights_madina"+madina_hotel_count+"' name='totalnights_madina[]' ></div>"+
                    "</div><div class='row' ><div class='col-sm-6'>Select Madina Hotel<select required class='form-control' name='madina_hotel[]' id='madinahotelname"+madina_hotel_count+"'><option>Select Hotel</option>@foreach($madina_hotel_db as $md_db)<option value='{{$md_db->id}}'>{{$md_db->name}} ({{$md_db->distance}})</option>@endforeach</select></div> <div class='col-sm-2'>Select Room Type<select required id='madinaroomtype"+madina_hotel_count+"' onchange='getmadinaroomfare("+madina_hotel_count+")' class='form-control' name='madina_hotel_roomtype[]'><option>Select Type</option>@foreach($room_type as $rt)<option value='{{$rt->id}}'>{{$rt->type_name}}</option>@endforeach</select></div><div class='col-sm-2'>Fare Per Night(SR)<label class='form-control' id='madinapricelabel"+madina_hotel_count+"'></label></div><div class='col-sm-2'>No of rooms<input required type='number' class='form-control' name='no_of_rooms_madina[]'></div></div><div class='row' style='border:1px solid transparent;text-align:right;'> <div class='col'><button class='btn btn-sm btn-danger' type='button' onclick='removerow_madina("+madina_hotel_count+")'>Remove</button></div></div><hr></div>");

            });

            $('#madina_hotel2').click(function () {

                madina_hotel_count++;
                $('#toappendmadina2').append("<div id='madinahotel"+madina_hotel_count+"'><div class='row'><div class='col-sm-4' >CheckIn Date<input class='form-control' required onchange='setcheckoutdate_madina("+madina_hotel_count+")' type='date' min='{{date('Y-m-d')}}' name='checkindate_madina"+madina_hotel_count+"' id='checkindate_madina"+madina_hotel_count+"'>"+
                    "</div><div class='col-sm-4'>CheckOut Date<input class='form-control' required type='date' onchange='test_madina("+madina_hotel_count+")' name='checkoutdate_madina"+madina_hotel_count+"' id='checkoutdate_madina"+madina_hotel_count+"'></div> <div class='col-sm-4'> Total Nights<input type='number' class='form-control' id='totalnights_madina"+madina_hotel_count+"' name='totalnights_madina[]' ></div>"+
                    "</div><div class='row' ><div class='col-sm-6'>Select Madina Hotel<select required class='form-control' name='madina_hotel[]' id='madinahotelname"+madina_hotel_count+"'><option>Select Hotel</option>@foreach($madina_hotel_db as $md_db)<option value='{{$md_db->id}}'>{{$md_db->name}} ({{$md_db->distance}})</option>@endforeach</select></div> <div class='col-sm-2'>Select Room Type<select required id='madinaroomtype"+madina_hotel_count+"' onchange='getmadinaroomfare("+madina_hotel_count+")' class='form-control' name='madina_hotel_roomtype[]'><option>Select Type</option>@foreach($room_type as $rt)<option value='{{$rt->id}}'>{{$rt->type_name}}</option>@endforeach</select></div><div class='col-sm-2'>Fare Per Night(SR)<label class='form-control' id='madinapricelabel"+madina_hotel_count+"'></label></div><div class='col-sm-2'>No of rooms<input required type='number' class='form-control' name='no_of_rooms_madina[]'></div></div><div class='row' style='border:1px solid transparent;text-align:right;'> <div class='col'><button class='btn btn-sm btn-danger' type='button' onclick='removerow_madina("+madina_hotel_count+")'>Remove</button></div></div><hr></div>");

            });

            $('#madina_hotel3').click(function () {

                madina_hotel_count++;
                $('#toappendmadina3').append("<div id='madinahotel"+madina_hotel_count+"'><div class='row'><div class='col-sm-4' >CheckIn Date<input class='form-control' required onchange='setcheckoutdate_madina("+madina_hotel_count+")' type='date' min='{{date('Y-m-d')}}' name='checkindate_madina"+madina_hotel_count+"' id='checkindate_madina"+madina_hotel_count+"'>"+
                    "</div><div class='col-sm-4'>CheckOut Date<input class='form-control' required type='date' onchange='test_madina("+madina_hotel_count+")' name='checkoutdate_madina"+madina_hotel_count+"' id='checkoutdate_madina"+madina_hotel_count+"'></div> <div class='col-sm-4'> Total Nights<input type='number' class='form-control' id='totalnights_madina"+madina_hotel_count+"' name='totalnights_madina[]' ></div>"+
                    "</div><div class='row' ><div class='col-sm-6'>Select Madina Hotel<select required class='form-control' name='madina_hotel[]' id='madinahotelname"+madina_hotel_count+"'><option>Select Hotel</option>@foreach($madina_hotel_db as $md_db)<option value='{{$md_db->id}}'>{{$md_db->name}} ({{$md_db->distance}})</option>@endforeach</select></div> <div class='col-sm-2'>Select Room Type<select required id='madinaroomtype"+madina_hotel_count+"' onchange='getmadinaroomfare("+madina_hotel_count+")' class='form-control' name='madina_hotel_roomtype[]'><option>Select Type</option>@foreach($room_type as $rt)<option value='{{$rt->id}}'>{{$rt->type_name}}</option>@endforeach</select></div><div class='col-sm-2'>Fare Per Night(SR)<label class='form-control' id='madinapricelabel"+madina_hotel_count+"'></label></div><div class='col-sm-2'>No of rooms<input required type='number' class='form-control' name='no_of_rooms_madina[]'></div></div><div class='row' style='border:1px solid transparent;text-align:right;'> <div class='col'><button class='btn btn-sm btn-danger' type='button' onclick='removerow_madina("+madina_hotel_count+")'>Remove</button></div></div><hr></div>");

            });


            $('#madina_hotel4').click(function () {

                madina_hotel_count++;
                $('#toappendmadina4').append("<div id='madinahotel"+madina_hotel_count+"'><div class='row'><div class='col-sm-4' >CheckIn Date<input class='form-control' required onchange='setcheckoutdate_madina("+madina_hotel_count+")' type='date' min='{{date('Y-m-d')}}' name='checkindate_madina"+madina_hotel_count+"' id='checkindate_madina"+madina_hotel_count+"'>"+
                    "</div><div class='col-sm-4'>CheckOut Date<input class='form-control' required type='date' onchange='test_madina("+madina_hotel_count+")' name='checkoutdate_madina"+madina_hotel_count+"' id='checkoutdate_madina"+madina_hotel_count+"'></div> <div class='col-sm-4'> Total Nights<input type='number' class='form-control' id='totalnights_madina"+madina_hotel_count+"' name='totalnights_madina[]' ></div>"+
                    "</div><div class='row' ><div class='col-sm-6'>Select Madina Hotel<select required id='madinahotelname"+madina_hotel_count+"' class='form-control' name='madina_hotel[]'><option>Select Hotel</option>@foreach($madina_hotel_db as $md_db)<option value='{{$md_db->id}}'>{{$md_db->name}} ({{$md_db->distance}})</option>@endforeach</select></div> <div class='col-sm-2'>Select Room Type<select required id='madinaroomtype"+madina_hotel_count+"' onchange='getmadinaroomfare("+madina_hotel_count+")' class='form-control' name='madina_hotel_roomtype[]'><option>Select Type</option>@foreach($room_type as $rt)<option value='{{$rt->id}}'>{{$rt->type_name}}</option>@endforeach</select></div><div class='col-sm-2'>Fare Per Night(SR)<label class='form-control' id='madinapricelabel"+madina_hotel_count+"'></label></div><div class='col-sm-2'>No of rooms<input required type='number' class='form-control' name='no_of_rooms_madina[]'></div></div><div class='row' style='border:1px solid transparent;text-align:right;'> <div class='col'><button class='btn btn-sm btn-danger' type='button' onclick='removerow_madina("+madina_hotel_count+")'>Remove</button></div></div><hr></div>");

            });

            $('#madina_hotel5').click(function () {

                madina_hotel_count++;
                $('#toappendmadina5').append("<div id='madinahotel"+madina_hotel_count+"'><div class='row'><div class='col-sm-4' >CheckIn Date<input class='form-control' required onchange='setcheckoutdate_madina("+madina_hotel_count+")' type='date' min='{{date('Y-m-d')}}' name='checkindate_madina"+madina_hotel_count+"' id='checkindate_madina"+madina_hotel_count+"'>"+
                    "</div><div class='col-sm-4'>CheckOut Date<input class='form-control' type='date' required onchange='test_madina("+madina_hotel_count+")' name='checkoutdate_madina"+madina_hotel_count+"' id='checkoutdate_madina"+madina_hotel_count+"'></div> <div class='col-sm-4'> Total Nights<input type='number' class='form-control' id='totalnights_madina"+madina_hotel_count+"' name='totalnights_madina[]' ></div>"+
                    "</div><div class='row' ><div class='col-sm-6'>Select Madina Hotel<select required class='form-control' name='madina_hotel[]'  id='madinahotelname"+madina_hotel_count+"'><option>Select Hotel</option>@foreach($madina_hotel_db as $md_db)<option value='{{$md_db->id}}'>{{$md_db->name}} ({{$md_db->distance}})</option>@endforeach</select></div> <div class='col-sm-2'>Select Room Type<select required id='madinaroomtype"+madina_hotel_count+"' onchange='getmadinaroomfare("+madina_hotel_count+")'  class='form-control' name='madina_hotel_roomtype[]'><option>Select Type</option>@foreach($room_type as $rt)<option value='{{$rt->id}}'>{{$rt->type_name}}</option>@endforeach</select></div><div class='col-sm-2'>Fare Per Night(SR)<label class='form-control' id='madinapricelabel"+madina_hotel_count+"'></label></div><div class='col-sm-2'>No of rooms<input required type='number' class='form-control' name='no_of_rooms_madina[]'></div></div><div class='row' style='border:1px solid transparent;text-align:right;'> <div class='col'><button class='btn btn-sm btn-danger' type='button' onclick='removerow_madina("+madina_hotel_count+")'>Remove</button></div></div><hr></div>");

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


        function setarrivaldatemindate() {

            var date=document.getElementById('departure_date_air').value;

            var newdate= new Date(date);
            var day= 60*60*24*1000;
            var enddate= new Date(newdate.getTime()+day*2);

            var dd = enddate.getDate();

            var mm = enddate.getMonth()+1;
            var yyyy = enddate.getFullYear();
            if(dd<10)
            {
                dd='0'+dd;
            }

            if(mm<10)
            {
                mm='0'+mm;
            }
            // var newdate2 = yyyy+'/'+mm+'/'+dd;
            // var newdate2 = dd+'/'+mm+'/'+yyyy;
            var newdate2 = yyyy+'-'+mm+'-'+dd;

            // document.getElementById('arriaval_date_air').datepicker('setStartDate', date);

            document.getElementById('arriaval_date_air').setAttribute("min",newdate2);

        }
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

        function getmadinaroomfare(id)
        {
            var hotel_id =document.getElementById('madinahotelname'+id).value;
            var room_id =document.getElementById('madinaroomtype'+id).value;

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                method: 'get', // Type of response and matches what we said in the route
                url: '{{url('/admin/roomfare')}}/'+hotel_id+'/'+room_id,
                dataType: "json",// This is the url we gave in the route
                data: {
                    _token: '{!! csrf_token() !!}',
                    hotel_id: hotel_id,
                    room_id: room_id
                }, // a JSON object to send back
                success: function(response){ // What to do if we succeed
                    // console.log(response);
                    // alert('Got Fare');
                    // routeFare.value = JSON.parse(response.price);
                    console.log(JSON.parse(response));
                    document.getElementById('madinapricelabel'+id).innerHTML=JSON.parse(response);

                    // routeFare.value = JSON.parse(response.price);
                },
                fail: function() { // What to do if we fail
                    console.log('fail');

                }
            });

        }


        function getmakkahroomfare(id)
        {
            var hotel_id =document.getElementById('makkahhotelname'+id).value;
            var room_id =document.getElementById('makkahroomtype'+id).value;

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                method: 'get', // Type of response and matches what we said in the route
                url: '{{url('/admin/roomfare')}}/'+hotel_id+'/'+room_id,
                dataType: "json",// This is the url we gave in the route
                data: {
                    _token: '{!! csrf_token() !!}',
                    hotel_id: hotel_id,
                    room_id: room_id
                }, // a JSON object to send back
                success: function(response){ // What to do if we succeed
                    // console.log(response);
                    // alert('Got Fare');
                    // routeFare.value = JSON.parse(response.price);
                    console.log(JSON.parse(response));
                    document.getElementById('makkahpricelabel'+id).innerHTML=JSON.parse(response);

                    // routeFare.value = JSON.parse(response.price);
                },
                fail: function() { // What to do if we fail
                    console.log('fail');

                }
            });

        }








        function setcheckoutdate_makkah(id)
        {
            var date=document.getElementById('checkindate_makkah'+id).value;

            var newdate= new Date(date);
            var day= 60*60*24*1000;
            var enddate= new Date(newdate.getTime()+day*2);

            var dd = enddate.getDate();
            var mm = enddate.getMonth()+1;
            var yyyy = enddate.getFullYear();
            if(dd<10)
            {
                dd='0'+dd;
            }

            if(mm<10)
            {
                mm='0'+mm;
            }
            var newdate2 = yyyy+'-'+mm+'-'+dd;

            document.getElementById('checkoutdate_makkah'+id).setAttribute("min",newdate2.toString());
        }

        function setcheckoutdate_madina(id)
        {
            var date=document.getElementById('checkindate_madina'+id).value;


            var newdate= new Date(date);
            var day= 60*60*24*1000;
            var enddate= new Date(newdate.getTime()+day*2);

            var dd = enddate.getDate();
            var mm = enddate.getMonth()+1;
            var yyyy = enddate.getFullYear();
            if(dd<10)
            {
                dd='0'+dd;
            }

            if(mm<10)
            {
                mm='0'+mm;
            }
            var newdate2 = yyyy+'-'+mm+'-'+dd;

            document.getElementById('checkoutdate_madina'+id).setAttribute("min",newdate2);
        }

        function test_makkah(id)
        {

            var startDate = Date.parse(document.getElementById('checkindate_makkah'+id).value);
            var endDate = Date.parse(document.getElementById('checkoutdate_makkah'+id).value);
            var timeDiff = endDate - startDate;
            daysDiff = Math.floor(timeDiff / (1000 * 60 * 60 * 24));
            document.getElementById('totalnights_makkah'+id).value=daysDiff;

            var i;
            var check=0;
            for(i=1;i<=makkah_hotel_count;i++)
{

    check=check+parseFloat(document.getElementById('totalnights_makkah'+i).value);

    if(check>packagedays)
    {

        alert('No of nights exceded');
    }
}

            for(i=1;i<=madina_hotel_count;i++)
            {

                check=check+parseFloat(document.getElementById('totalnights_madina'+i).value);

                if(check>packagedays)
                {

                    alert('No of nights exceded');
                }
            }

        }

        function test_madina(id)
        {
            var startDate = Date.parse(document.getElementById('checkindate_madina'+id).value);
            var endDate = Date.parse(document.getElementById('checkoutdate_madina'+id).value);
            var timeDiff = endDate - startDate;
            daysDiff = Math.floor(timeDiff / (1000 * 60 * 60 * 24));
            document.getElementById('totalnights_madina'+id).value=daysDiff;
            // globalcheck=globalcheck+daysDiff;
            // if(globalcheck>packagedays)
            // {
            //     alert('No of nights exceded');
            //     // document.getElementById('totalnights_madina'+id).value=0;
            //
            //
            // }


            var i;
            var check=0;
            for(i=1;i<=madina_hotel_count;i++) {

                check = check + parseFloat(document.getElementById('totalnights_madina' + i).value);

                if (check > packagedays) {

                    alert('No of nights exceded');
                }
            }

            for(i=1;i<=makkah_hotel_count;i++) {

                check = check + parseFloat(document.getElementById('totalnights_makkah' + i).value);

                if (check > packagedays) {

                    alert('No of nights exceded');
                }
            }


        }


        function removerow_makkah(id)
        {
makkah_hotel_count--;
            var elem = document.getElementById("makkahhotel"+id);
            elem.remove();
        }

        function removerow_madina(id)
        {
            var elem = document.getElementById("madinahotel"+id);
            elem.remove();
        }
        $("#departure_date_air").on("change", function() {
            this.setAttribute(
                "data-date",
                moment(this.value, "YYYY-MM-DD")
                    .format( this.getAttribute("data-date-format") )
            )
        }).trigger("change")
    </script>
    <script>
        window.onbeforeunload = function() {
            return "Entered Data will be lost!! Do you really want to leave?";
        };
    </script>
    <a href="{{route('frontend.index1')}}">

<button class="btn btn-success btn-sm float-right m-2">
    <i class="fas fa-arrow-alt-circle-left"></i>
    Previous Menu</button>

    </a>
    <form class="form-horizontal" action="{{route('frontend.formrule')}}" method="get" style="border: 1px solid black;border-radius:10px;padding: 10px;" >
        @csrf
        <h4>
            <i class="fas fa-users" aria-hidden="true"></i>
            Family Information</h4>

        <div class="row">
            <label class="control-label col-sm-2" for="email">Family Name:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="email" placeholder="Enter family name" name="family_name"  required>
            </div>
        </div>




        <div class="row">
            <label class="control-label col-sm-2" for="email">Contact No</label>
            <div class="col-sm-10">
                <input type="text" class="contact form-control" id="contact"  name="contact"  placeholder="Enter contact No" required>
            </div>
        </div>




        <div class="row">
            <label class="control-label col-sm-2" for="email">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
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
                <input type="text" class="form-control" name="package_duration">
            </div>
        </div>
        <hr>

        <h4>
            <i class="fas fa-address-book" aria-hidden="true"></i>
            Visa
        </h4>
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
        <h4>
            <i class="fas fa-bed" aria-hidden="true"></i>

            Accommodation</h4>
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
                    <button type="button" class="btn btn-primary float-right" id="makkah_hotel">
                        Add Hotel</button>
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




        <h4>
            <i class="fas fa-taxi" aria-hidden="true"></i>

            Transport</h4>
        <div class="row">
            <div class="col-sm-12">
                Do you want to include private transport?
                Yes <input type="checkbox" id="transportation_checkbox">


                <div id="transportation_details">
                    {{--                        <button class="btn btn-success" type="button" id="add_routes_button">Add more routes</button>--}}

                    <u>Please Select Your Desire Route</u><br><br>
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

                                            <option value="{{$v->id}}">{{$v->name}}({{$v->seating_capacity}} Seater)</option>

                                        @endif

                                    @endforeach
                                </select>
                            </div>



                            <div class="col-sm-4">
                                Fare SR:<input type="text" disabled class="form-control" id="{{$r->id.'fare'}}">
                            </div>
                        </div>
                    @endforeach





                </div>


            </div>
        </div>


        <hr>
        <div class="row">
            <div class="col-sm-12">
                <h4>
                    <i class="fas fa-search" aria-hidden="true"></i>

                    Ziarat</h4>
                Do You want to include ziarat in Makkah & Madina?
                Yes <input type="checkbox" class="ziarat_checkbox">


                <div id="ziarat_details">
                    Ziarat Price:
                    <input type="text" disabled value="{{$ziarat_price}} SR"  class="form-control">
                    Enter total persons:
                    <input type="text" name="persons_for_ziarat"  class="form-control">

                </div>
            </div>
        </div>

        <hr>
        <div class="row">


            <div class="col-sm-12">

                <h4>
                    <i class="fa fa-plane" aria-hidden="true"></i>

                    Flight</h4>
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
                                                        <input type="date"   onchange="setarrivaldatemindate()" name="departure_date_air" id="departure_date_air" class="form-control" min="{{date('Y-m-d')}}">
{{--                                                        <input type="date" name="departure_date_air" onchange="setarrivaldatemindate()"  id="departure_date_air" value={{date('Y/m/d')}} "   class="form-control" >--}}
{{--                            <input type="text" name="departure_date_air"   id="departure_date_air"   data-date-format="dd/mm/yy"   class="form-control">--}}


                        </div>
                        <div class="col">

                            Arrival Date
                            <input type="date"   class="form-control" name="arriaval_date_air" id="arriaval_date_air" min="{{date('Y-m-d')}}">

{{--                            <input type="date"  class="form-control" id="arriaval_date_air">--}}
{{--                            <input style="outline: none" type="text" name="arriaval_date_air"   id="arriaval_date_air"   data-date-format="dd/mm/yy"   class="form-control">--}}

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
                            Adult Ticket Price (PKR)<input name="adult_air_price" type="text" class="form-control">
                        </div>
                        <div class="col">
                            Child Ticket Price (PKR)<input name="child_air_price" type="text" class="form-control">
                        </div>
                        <div class="col">
                            Infant Ticket Price (PKR)<input name="infant_air_price" type="text" class="form-control">
                        </div>
                    </div>


                </div>

            </div>




        </div>




        <button type="submit" class="btn btn-primary" style="margin-left: 420px;width: 250px;margin-top: 50px">
            <i class="fas fa-calculator" aria-hidden="true"></i> Calculate Fare

        </button>
    </form>


@endsection
