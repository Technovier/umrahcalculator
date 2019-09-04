
@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')


<div class="container-fluid" style="padding: 10px">
        <div class="row" >
            <div class="col" style="text-align: center">
{{--                <h3 style="color: #00aced">Detailed Calculations</h3>--}}
                <h2 style="color: #00aced">Tawaf Travels & Tours PVT(LTD)</h2>
                <label>F-16/17,Hill View Arcade, 5-Davis Road ,Lahore</label> <br>
                <label>Phone:042-36315418-19, Fax:042-362711315 UAN:042-11111111893</label>
                <h4><b>Quotation  for Umrah Packagae</b></h4>
            </div>
        </div>

<div class="row">

    <div class="col" style="border: 1px solid black;background-color: lightgray"><b>Family Information</b></div>
</div>
        <div class="row" >
            <div class="col">
Family Name:            </div>
            <div class="col" >
            {{request()->family_name}} and family (


                @if(request()->visa_adult!=null and request()->visa_adult!=0)
                    {{request()->visa_adult}} Adults
                    @endif


                @if(request()->visa_child!=null and request()->visa_child!=0)
                    and {{request()->visa_child}} Children
                @endif

                @if(request()->visa_infant!=null and request()->visa_infant!=0)
                     and {{request()->visa_infant}} Infants
                @endif

)
            </div>
        </div>



        <div class="row">
            <div class="col">
               Contact No
            </div>
            <div class="col">
                {{request()->contact}}
            </div>
        </div>



        <div class="row">
            <div class="col">
            Email:
            </div>
            <div class="col">
                {{request()->email}}
            </div>
        </div>
<div class="row">
    <div class="col" style="border: 1px solid black;background-color: lightgray"><b>Umrah Package Details</b></div>

</div>




    @if(request()->has('checkindate_makkah1') and request()->has('checkindate_madina1'))
        @if(request()->checkindate_makkah1 < request()->checkindate_madina1)
            <div class="row">
                <div class="col"><h5 style="font-weight: bold">Stay in Makkah</h5></div>
            </div>


            @php($check=1)
            @php($total_makkah_room_fare=0)
            @if(request()->has('makkah_hotel'))
                @foreach(request()->makkah_hotel as $mk_h)


                    <?php $hotel_name=DB::table('hotel')->where('id',$mk_h)->value('name');
                    $hotel_distance=DB::table('hotel')->where('id',$mk_h)->value('distance');

                    echo '<div class="row">';
                    $checkin='checkindate_makkah'.$check;
                    $checkout='checkoutdate_makkah'.$check;

                    echo '<div class="col">Stay in Makkah: From '. date_format(date_create(request()->$checkin),"d-M-Y") ;


                        if(request()->totalnights_makkah[$check-1]==1)
                            {

                                echo ' To '. date_format(date_create(request()->$checkout),"d-M-Y").' for <b>('.request()->totalnights_makkah[$check-1].' Night)</b></div>';
                            }
                        else
                            {

                                echo ' To '. date_format(date_create(request()->$checkout),"d-M-Y").' for <b>('.request()->totalnights_makkah[$check-1].' Nights)</b></div>';
                            }

                    echo '</div>';


                    echo '<div class="row">';
                    echo '<div class="col">Hotel: '.$hotel_name.' '.$hotel_distance.'</div>';
                    echo '</div>';

                    echo '<div class="row">';
                    echo '<div class="col">Room Type: '. request()->no_of_rooms_makkah[$check-1].'  '.DB::table('room_type')->where('id',request()->makkah_hotel_roomtype[$check-1])->value('type_name').' Room</div>';
                    echo '</div>';


                    echo '<div class="row">';
                    echo '<div class="col">Room Rate: '.DB::table('hotel_room')->where('hotel_id',$mk_h)->where('room_type',request()->makkah_hotel_roomtype[$check-1])->value('price').' SR/Night</div>';
                    echo '</div>';


                    ?>



                    @php($total_makkah_room_fare=$total_makkah_room_fare+request()->no_of_rooms_makkah[$check-1]*request()->totalnights_makkah[$check-1]*DB::table('hotel_room')->where('hotel_id',$mk_h)->where('room_type',request()->makkah_hotel_roomtype[$check-1])->value('price'))

                    @php($check++)
                    <hr>
                @endforeach
            @endif












            @php($check=1)
            @php($total_madina_room_fare=0)
            @if(request()->has('madina_hotel'))
                <div class="row">
                    <div class="col"><h5 style="font-weight: bold">Stay in Madina</h5></div>
                </div>

                @foreach(request()->madina_hotel as $md_h)

                    <?php $hotel_name=DB::table('hotel')->where('id',$md_h)->value('name');
                    $hotel_distance=DB::table('hotel')->where('id',$md_h)->value('distance');

                    echo '<div class="row">';
                    $checkin='checkindate_madina'.$check;
                    $checkout='checkoutdate_madina'.$check;

                    echo '<div class="col">Stay in Madina: From '. date_format(date_create(request()->$checkin),"d-M-Y");


                    if(request()->totalnights_madina[$check-1]==1)
                    {

                        echo ' To '. date_format(date_create(request()->$checkout),"d-M-Y").' for <b>('.request()->totalnights_madina[$check-1].' Night)</b></div>';
                    }
                    else
                    {

                        echo ' To '. date_format(date_create(request()->$checkout),"d-M-Y").' for <b>('.request()->totalnights_madina[$check-1].' Nights)</b></div>';
                    }
                    echo '</div>';


                    echo '<div class="row">';
                    echo '<div class="col">Hotel: '.$hotel_name.' '.$hotel_distance.'</div>';
                    echo '</div>';

                    echo '<div class="row">';
                    echo '<div class="col">Room Type: '. request()->no_of_rooms_madina[$check-1].'  '.DB::table('room_type')->where('id',request()->madina_hotel_roomtype[$check-1])->value('type_name').' Room</div>';
                    echo '</div>';


                    echo '<div class="row">';
                    echo '<div class="col">Room Rate: '.DB::table('hotel_room')->where('hotel_id',$md_h)->where('room_type',request()->madina_hotel_roomtype[$check-1])->value('price').' SR/Night</div>';
                    echo '</div>';


                    ?>

                    @php($total_madina_room_fare=$total_madina_room_fare+request()->no_of_rooms_madina[$check-1]*request()->totalnights_madina[$check-1]*DB::table('hotel_room')->where('hotel_id',$md_h)->where('room_type',request()->madina_hotel_roomtype[$check-1])->value('price'))

                    @php($check++)
                    <hr>
                @endforeach

            @endif


            @else

            @php($check=1)
            @php($total_madina_room_fare=0)
            @if(request()->has('madina_hotel'))
                <div class="row">
                    <div class="col"><h5 style="font-weight: bold">Stay in Madina</h5></div>
                </div>

                @foreach(request()->madina_hotel as $md_h)

                    <?php $hotel_name=DB::table('hotel')->where('id',$md_h)->value('name');
                    $hotel_distance=DB::table('hotel')->where('id',$md_h)->value('distance');

                    echo '<div class="row">';
                    $checkin='checkindate_madina'.$check;
                    $checkout='checkoutdate_madina'.$check;

                    echo '<div class="col">Stay in Madina: From '. date_format(date_create(request()->$checkin),"d-M-Y");

                    echo ' To '. date_format(date_create(request()->$checkout),"d-M-Y").' for <b>('.request()->totalnights_madina[$check-1].' Nights)</b></div>';

                    echo '</div>';


                    echo '<div class="row">';
                    echo '<div class="col">Hotel: '.$hotel_name.' '.$hotel_distance.'</div>';
                    echo '</div>';

                    echo '<div class="row">';
                    echo '<div class="col">Room Type: '. request()->no_of_rooms_madina[$check-1].'  '.DB::table('room_type')->where('id',request()->madina_hotel_roomtype[$check-1])->value('type_name').' Room</div>';
                    echo '</div>';


                    echo '<div class="row">';
                    echo '<div class="col">Room Rate: '.DB::table('hotel_room')->where('hotel_id',$md_h)->where('room_type',request()->madina_hotel_roomtype[$check-1])->value('price').' SR/Night</div>';
                    echo '</div>';


                    ?>

                    @php($total_madina_room_fare=$total_madina_room_fare+request()->no_of_rooms_madina[$check-1]*request()->totalnights_madina[$check-1]*DB::table('hotel_room')->where('hotel_id',$md_h)->where('room_type',request()->madina_hotel_roomtype[$check-1])->value('price'))

                    @php($check++)
                    <hr>
                @endforeach

            @endif















            <div class="row">
                <div class="col"><h5 style="font-weight: bold">Stay in Makkah</h5></div>
            </div>


            @php($check=1)
            @php($total_makkah_room_fare=0)
            @if(request()->has('makkah_hotel'))
                @foreach(request()->makkah_hotel as $mk_h)


                    <?php $hotel_name=DB::table('hotel')->where('id',$mk_h)->value('name');
                    $hotel_distance=DB::table('hotel')->where('id',$mk_h)->value('distance');

                    echo '<div class="row">';
                    $checkin='checkindate_makkah'.$check;
                    $checkout='checkoutdate_makkah'.$check;

                    echo '<div class="col">Stay in Makkah: From '. date_format(date_create(request()->$checkin),"d-M-Y");

                    echo ' To '. date_format(date_create(request()->$checkout),"d-M-Y").' for <b>('.request()->totalnights_makkah[$check-1].' Nights)</b></div>';

                    echo '</div>';


                    echo '<div class="row">';
                    echo '<div class="col">Hotel: '.$hotel_name.' '.$hotel_distance.'</div>';
                    echo '</div>';

                    echo '<div class="row">';
                    echo '<div class="col">Room Type: '. request()->no_of_rooms_makkah[$check-1].'  '.DB::table('room_type')->where('id',request()->makkah_hotel_roomtype[$check-1])->value('type_name').' Room</div>';
                    echo '</div>';


                    echo '<div class="row">';
                    echo '<div class="col">Room Rate: '.DB::table('hotel_room')->where('hotel_id',$mk_h)->where('room_type',request()->makkah_hotel_roomtype[$check-1])->value('price').' SR/Night</div>';
                    echo '</div>';


                    ?>



                    @php($total_makkah_room_fare=$total_makkah_room_fare+request()->no_of_rooms_makkah[$check-1]*request()->totalnights_makkah[$check-1]*DB::table('hotel_room')->where('hotel_id',$mk_h)->where('room_type',request()->makkah_hotel_roomtype[$check-1])->value('price'))

                    @php($check++)
                    <hr>
                @endforeach
            @endif



            @endif

        @else
        <?php
        $total_makkah_room_fare=0;
        $total_madina_room_fare=0;

        ?>
        @endif





    <div class="row">
        <div class="col" style="border: 1px solid black;background-color: lightgray"><b>Ziarat</b></div>

    </div>
    @if(request()->persons_for_ziarat!=null)

        <div class="row" style="font-weight: bold">

            <div class="col">Ziarat Price</div>
            <div class="col">No. of Persons</div>

            <div class="col">Total Fare (SR)</div>

        </div>


        <div class="row">
@php($ziarat=DB::table('ziarat')->value('price'))
            <div class="col"> <?php echo $ziarat; ?></div>
            <div class="col">{{request()->persons_for_ziarat}}</div>

            <div class="col">{{request()->persons_for_ziarat*$ziarat}}</div>

        </div>



        @else

        <div class="row">

            <div class="col">Ziarat Not included</div>
        </div>

    @endif


    <div class="row">
        <div class="col" style="border: 1px solid black;background-color: lightgray"><b>Transportation</b></div>

    </div>




    <div class="row" style="font-weight: bold">

        <div class="col">Route Name</div>
        <div class="col">Vehicle Name</div>
        <div class="col">Total Fare  (SR)</div>
    </div>

    @if(request()->transport_route!=null)
@php($id=0)
        @php($total=0)
        <?php $vehicals=request()->selected_vehicals;
        $final_collect=collect();
        foreach ($vehicals as $v)

        {
            if ($v!=null)
            {

                $final_collect->push($v);
            }
        }
        ?>


    @foreach(request()->transport_route as $tr)

                <div class="row">

                    <div class="col">

                        <?php echo DB::table('routes')->where('id',$tr)->value('route');?>
                    </div>

                    <div class="col">

                        <?php echo DB::table('vehicals')->where('id',$final_collect[$id])->value('name');?>
                    </div>

                    <div class="col">

                        <?php echo DB::table('vehical_routes_fairs')->where('route_id',$tr)->where('vehical_id',$final_collect[$id])->value('fare');?>
                        <?php $total=$total+DB::table('vehical_routes_fairs')->where('route_id',$tr)->where('vehical_id',$final_collect[$id])->value('fare');?>
                    </div>


                </div>


            @php($id+=1)

            @endforeach




    @else

        <div class="row">
            <div class="col">Economy by Bus</div>
        </div>
@endif



    <div class="row">
        <div class="col" style="border: 1px solid black;background-color: lightgray"><b>Flight Information</b></div>
    </div>



    <div class="row">
        @if(request()->has('flight_checkbox'))
            <div class="col">


                <?php echo 'Departure Date: '.date_format(date_create(request()->departure_date_air),"d-M-Y").'<br>';
                 echo 'Arrival Date: '.date_format(date_create(request()->arriaval_date_air),"d-M-Y").'<br>';
                 echo 'AirLine: '.request()->AirLine.'<br>';
                  echo 'Total Tickets Fare:  PKR '.$flight_cost_pkr=request()->air_adult*request()->adult_air_price+request()->air_children*request()->child_air_price+request()->infant_air_price*request()->air_infant;
                 ?>
            </div>
@else
            <div class="col">
{{'No Flight Data Found'}}
                @php($flight_cost_rayal=0)
            </div>

        @endif

    </div>

    <div class="row">
        <div class="col" style="border: 1px solid black;background-color: lightgray"><b>Total Payable</b></div>
    </div>





        <div class="row">
        <div class="col">Visa Charges:
<?php

            echo 'SR  ';
                 echo $visa_charges=request()->visa_adult*DB::table('visa_rates')->value('adult')+
                request()->visa_child*DB::table('visa_rates')->value('child')+
                request()->visa_infant*DB::table('visa_rates')->value('infant');


            ?>
        </div>


            <div class="col">

                Current Saudi Riyal Rate:
                {{DB::table('rayal_rate')->value('rate')}}
            </div>
        </div>
        <div class="row">
            <div class="col">Accomodation Charges:
                {{'SR '}}
            {{$total_room_fare=$total_makkah_room_fare+$total_madina_room_fare}}</div>
            </div>

        <div class="row">
            <div class="col">Ziarat Charges:
            @if(request()->persons_for_ziarat!=null)
                    {{'SR '}}
                    {{$ziarat_charges=request()->persons_for_ziarat*$ziarat}}
                @else
                    {{'SR '}}
                {{$ziarat_charges=0}}
                @endif
            </div>
            </div>



        <div class="row">
            <div class="col">Transportation Charges:

                @if(request()->transport_route!=null)
                    {{'SR '}}
                {{$transportation_charges=$total}}
@else
                    {{'SR '}}
                    {{$transportation_charges=0}}
                    @endif
            </div>
            </div>


                @if(request()->has('flight_checkbox'))

                @else
                @php($flight_cost_pkr=0)
    @endif



    <div class="row">
    <div class="col" style="text-align: center">
        <h4 style="font-weight: bold">Umrah Package Cost = PKR  {{($total_room_fare+$ziarat_charges+$transportation_charges+$visa_charges)*($rayal=DB::table('rayal_rate')->value('rate'))}}  </h4>
    </div>
    </div>

@if($flight_cost_pkr!=0)
    <div class="row">
    <div class="col" style="text-align: center">
        <h4 style="font-weight: bold">Ticket Cost = PKR  {{$flight_cost_pkr}}  </h4>
    </div>
    </div>
@endif
    <div class="row">
    <div class="col" style="text-align: center">
        <h4 style="font-weight: bold">Total Payable = PKR  {{($total_room_fare+$ziarat_charges+$transportation_charges+$visa_charges)*($rayal=DB::table('rayal_rate')->value('rate'))+$flight_cost_pkr}}  </h4>
    </div>
    </div>

</div>
        @endsection
