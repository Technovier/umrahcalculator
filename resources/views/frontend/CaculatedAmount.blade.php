<style>
    button{
        background: darkslategray;
        color: white;
        padding: 5px;
        border-radius: 20px;
    }

    a{

        background: transparent ;
    }
</style>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>

<div class="container-fluid" style="padding: 10px">
        <div class="row" >
            <div class="col" style="text-align: center">
                <label style="color: #00aced">Tawaf Travels & Tours PVT(LTD)</label> <br>
                <label>F-16/17,Hill View Arcade, 5-Davis Road ,Lahore</label> <br>
                <label>Phone:042-36315418-19, Fax:042-362711315 UAN:042-11111111893</label><br>
                <label><b>Quotation for Umrah Package</b></label>
            </div>
        </div>
    <br>


    <table style="width: 100%;font-size: 12px;" >

        <tr style="border: 1px solid black;background-color: lightgray;border: 1px solid black;">
            <td colspan="3" style="border: 1px solid black;"><b>Family Information</b></td>
        </tr>

        <tr>
            <td>Family Name:</td>
            <td colspan="3"> {{request()->family_name}} and family (


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



            </td>
        </tr>
        <tr>
            <td>Contact No</td>
            <td>{{request()->contact}}</td>
        </tr>
        <tr>
            <td>Email:</td>
            <td>{{request()->email}}</td>
        </tr>



        <tr  style="border: 1px solid black;background-color: lightgray;border: 1px solid black;">
            <td colspan="3" style="border: 1px solid black;"><b>Umrah Package Details</b></td>
        </tr>





        @if(request()->has('checkindate_makkah1') and request()->has('checkindate_madina1'))
            @if(request()->checkindate_makkah1 < request()->checkindate_madina1)
                <tr>
                    <td colspan="3"><label style="font-weight: bold">Stay in Makkah</label></td>
                </tr>


                @php($check=1)
                @php($total_makkah_room_fare=0)
                @if(request()->has('makkah_hotel'))
                    @foreach(request()->makkah_hotel as $mk_h)


                        <?php $hotel_name=DB::table('hotel')->where('id',$mk_h)->value('name');
                        $hotel_distance=DB::table('hotel')->where('id',$mk_h)->value('distance');

                        echo '<tr>';
                        $checkin='checkindate_makkah'.$check;
                        $checkout='checkoutdate_makkah'.$check;

                        echo '<td colspan="3">Stay in Makkah: From '. date_format(date_create(request()->$checkin),"d-M-Y") ;


                        if(request()->totalnights_makkah[$check-1]==1)
                        {

                            echo ' To '. date_format(date_create(request()->$checkout),"d-M-Y").' for <b>('.request()->totalnights_makkah[$check-1].' Night)</b></td>';
                        }
                        else
                        {

                            echo ' To '. date_format(date_create(request()->$checkout),"d-M-Y").' for <b>('.request()->totalnights_makkah[$check-1].' Nights)</b></td>';
                        }

                        echo '</tr>';


                        echo '<tr>';
                        echo '<td>Hotel: '.$hotel_name.' '.$hotel_distance.'</td>';
                        echo '</tr>';

                        echo '<tr>';
                        echo '<td class="col">Room Type: '. request()->no_of_rooms_makkah[$check-1].'  '.DB::table('room_type')->where('id',request()->makkah_hotel_roomtype[$check-1])->value('type_name').' Room</td>';
                        echo '</tr>';


                        echo '<tr>';
                        echo '<td>Room Rate: '.DB::table('hotel_room')->where('hotel_id',$mk_h)->where('room_type',request()->makkah_hotel_roomtype[$check-1])->value('price').' SR/Night</td>';
                        echo '</tr>';


                        ?>



                        @php($total_makkah_room_fare=$total_makkah_room_fare+request()->no_of_rooms_makkah[$check-1]*request()->totalnights_makkah[$check-1]*DB::table('hotel_room')->where('hotel_id',$mk_h)->where('room_type',request()->makkah_hotel_roomtype[$check-1])->value('price'))

                        @php($check++)

                    @endforeach
                @endif












                @php($check=1)
                @php($total_madina_room_fare=0)
                @if(request()->has('madina_hotel'))
                    <tr>
                        <td><label style="font-weight: bold">Stay in Madina</label></td>
                    </tr>

                    @foreach(request()->madina_hotel as $md_h)

                        <?php $hotel_name=DB::table('hotel')->where('id',$md_h)->value('name');
                        $hotel_distance=DB::table('hotel')->where('id',$md_h)->value('distance');

                        echo '<tr>';
                        $checkin='checkindate_madina'.$check;
                        $checkout='checkoutdate_madina'.$check;

                        echo '<td>Stay in Madina: From '. date_format(date_create(request()->$checkin),"d-M-Y");


                        if(request()->totalnights_madina[$check-1]==1)
                        {

                            echo ' To '. date_format(date_create(request()->$checkout),"d-M-Y").' for <b>('.request()->totalnights_madina[$check-1].' Night)</b></td>';
                        }
                        else
                        {

                            echo ' To '. date_format(date_create(request()->$checkout),"d-M-Y").' for <b>('.request()->totalnights_madina[$check-1].' Nights)</b></td>';
                        }
                        echo '</tr>';


                        echo '<tr>';
                        echo '<td>Hotel: '.$hotel_name.' '.$hotel_distance.'</td>';
                        echo '</tr>';

                        echo '<tr>';
                        echo '<td>Room Type: '. request()->no_of_rooms_madina[$check-1].'  '.DB::table('room_type')->where('id',request()->madina_hotel_roomtype[$check-1])->value('type_name').' Room</td>';
                        echo '</tr>';


                        echo '<tr>';
                        echo '<td class="col">Room Rate: '.DB::table('hotel_room')->where('hotel_id',$md_h)->where('room_type',request()->madina_hotel_roomtype[$check-1])->value('price').' SR/Night</td>';
                        echo '</tr>';


                        ?>

                        @php($total_madina_room_fare=$total_madina_room_fare+request()->no_of_rooms_madina[$check-1]*request()->totalnights_madina[$check-1]*DB::table('hotel_room')->where('hotel_id',$md_h)->where('room_type',request()->madina_hotel_roomtype[$check-1])->value('price'))

                        @php($check++)

                    @endforeach

                @endif


            @else

                @php($check=1)
                @php($total_madina_room_fare=0)
                @if(request()->has('madina_hotel'))
                    <tr>
                        <td class="col" colspan="3"><label style="font-weight: bold">Stay in Madina</label></td>
                    </tr>

                    @foreach(request()->madina_hotel as $md_h)

                        <?php $hotel_name=DB::table('hotel')->where('id',$md_h)->value('name');
                        $hotel_distance=DB::table('hotel')->where('id',$md_h)->value('distance');

                        echo '<tr>';
                        $checkin='checkindate_madina'.$check;
                        $checkout='checkoutdate_madina'.$check;

                        echo '<td colspan="3">Stay in Madina: From '. date_format(date_create(request()->$checkin),"d-M-Y");

                        echo ' To '. date_format(date_create(request()->$checkout),"d-M-Y").' for <b>('.request()->totalnights_madina[$check-1].' Nights)</b></td>';

                        echo '</tr>';


                        echo '<tr>';
                        echo '<td>Hotel: '.$hotel_name.' '.$hotel_distance.'</td>';
                        echo '</tr>';

                        echo '<tr>';
                        echo '<td>Room Type: '. request()->no_of_rooms_madina[$check-1].'  '.DB::table('room_type')->where('id',request()->madina_hotel_roomtype[$check-1])->value('type_name').' Room</td>';
                        echo '</tr>';


                        echo '<tr>';
                        echo '<td>Room Rate: '.DB::table('hotel_room')->where('hotel_id',$md_h)->where('room_type',request()->madina_hotel_roomtype[$check-1])->value('price').' SR/Night</td>';
                        echo '</tr>';


                        ?>

                        @php($total_madina_room_fare=$total_madina_room_fare+request()->no_of_rooms_madina[$check-1]*request()->totalnights_madina[$check-1]*DB::table('hotel_room')->where('hotel_id',$md_h)->where('room_type',request()->madina_hotel_roomtype[$check-1])->value('price'))

                        @php($check++)

                    @endforeach

                @endif















                <tr>
                    <td colspan="3"><label style="font-weight: bold">Stay in Makkah</label></td>
                </tr>


                @php($check=1)
                @php($total_makkah_room_fare=0)
                @if(request()->has('makkah_hotel'))
                    @foreach(request()->makkah_hotel as $mk_h)


                        <?php $hotel_name=DB::table('hotel')->where('id',$mk_h)->value('name');
                        $hotel_distance=DB::table('hotel')->where('id',$mk_h)->value('distance');

                        echo '<tr>';
                        $checkin='checkindate_makkah'.$check;
                        $checkout='checkoutdate_makkah'.$check;

                        echo '<td colspan="3">Stay in Makkah: From '. date_format(date_create(request()->$checkin),"d-M-Y");

                        echo ' To '. date_format(date_create(request()->$checkout),"d-M-Y").' for <b>('.request()->totalnights_makkah[$check-1].' Nights)</b></td>';

                        echo '</tr>';


                        echo '<tr>';
                        echo '<td>Hotel: '.$hotel_name.' '.$hotel_distance.'</td>';
                        echo '</tr>';

                        echo '<tr>';
                        echo '<td>Room Type: '. request()->no_of_rooms_makkah[$check-1].'  '.DB::table('room_type')->where('id',request()->makkah_hotel_roomtype[$check-1])->value('type_name').' Room</td>';
                        echo '</tr>';


                        echo '<tr>';
                        echo '<td>Room Rate: '.DB::table('hotel_room')->where('hotel_id',$mk_h)->where('room_type',request()->makkah_hotel_roomtype[$check-1])->value('price').' SR/Night</div>';
                        echo '</tr>';


                        ?>



                        @php($total_makkah_room_fare=$total_makkah_room_fare+request()->no_of_rooms_makkah[$check-1]*request()->totalnights_makkah[$check-1]*DB::table('hotel_room')->where('hotel_id',$mk_h)->where('room_type',request()->makkah_hotel_roomtype[$check-1])->value('price'))

                        @php($check++)

                    @endforeach
                @endif



            @endif

        @else
            <?php
            $total_makkah_room_fare=0;
            $total_madina_room_fare=0;

            ?>
        @endif









<tr  style="border: 1px solid black;background-color: lightgray;">
    <td colspan="3" style="border: 1px solid black;"><b>Ziarat</b></td>
</tr>

        @if(request()->persons_for_ziarat!=null)


            <tr style="font-weight: bold">
                <td>Ziarat Price</td>
                <td>No. of Persons</td>
                <td>Total Fare(SR)</td>
            </tr>


            <tr>
                @php($ziarat=DB::table('ziarat')->value('price'))
                <td> <?php echo $ziarat; ?></td>
                <td>{{request()->persons_for_ziarat}}</td>

                <td>{{request()->persons_for_ziarat*$ziarat}}</td>

            </tr>



        @else
            <tr >
                <td>Ziarat Not included</td>
            </tr>

        @endif



        <tr>
            <td style="border: 1px solid black;background-color: lightgray" colspan="3"><b>Transportation</b></td>

        </tr>






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
            @if($final_collect->isNotEmpty())
            <tr style="font-weight: bold">

                <td>Route Name</td>
                <td>Vehicle Name</td>
                <td>Total Fare(SR)</td>

            </tr>
            @endif

            @foreach(request()->transport_route as $tr)


                    @if($final_collect->isNotEmpty())
                    <tr>
                    <td>

                        <?php echo DB::table('routes')->where('id',$tr)->value('route');?>
                    </td>

                        <td>
                            <?php echo DB::table('vehicals')->where('id',$final_collect[$id])->value('name');?>
                        </td>

                        <td>

                            <?php echo DB::table('vehical_routes_fairs')->where('route_id',$tr)->where('vehical_id',$final_collect[$id])->value('fare');?>

                            <?php $total=$total+DB::table('vehical_routes_fairs')->where('route_id',$tr)->where('vehical_id',$final_collect[$id])->value('fare');?>
                        </td>
                    </tr>
                     @endif


                @php($id+=1)

            @endforeach
        @else

            <tr>
                <td colspan="3">Economy by Bus</td>
            </tr>
        @endif

        <tr>
            <td style="border: 1px solid black;background-color: lightgray" colspan="3"><b>Flight Information</b></td>
        </tr>



        <tr>
            @if(request()->has('flight_checkbox'))
                <td>


                    <?php echo 'Departure Date: '.date_format(date_create(request()->departure_date_air),"d-M-Y").'<br>';
                    echo 'Arrival Date: '.date_format(date_create(request()->arriaval_date_air),"d-M-Y").'<br>';
                    echo 'AirLine: '.request()->AirLine.'<br>';
                    echo 'Total Tickets Fare:  PKR '.$flight_cost_pkr=request()->air_adult*request()->adult_air_price+request()->air_children*request()->child_air_price+request()->infant_air_price*request()->air_infant;
                    ?>
                </td>
            @else
                <td>
                    {{'No Flight Data Found'}}
                    @php($flight_cost_rayal=0)
                </td>

            @endif

        </tr>

        <tr>
            <td style="border: 1px solid black;background-color: lightgray" colspan="3" ><b>Total Payable</b></td>
        </tr>





        <tr>
            <td class="col">Visa Charges:
                <?php

                echo 'SR  ';
                echo $visa_charges=request()->visa_adult*DB::table('visa_rates')->value('adult')+
                    request()->visa_child*DB::table('visa_rates')->value('child')+
                    request()->visa_infant*DB::table('visa_rates')->value('infant');


                ?>
            </td>


            <td>

                Current Saudi Riyal Rate:
                {{DB::table('rayal_rate')->value('rate')}}
            </td>
        </tr>
        <tr>
            <td class="col">Accomodation Charges:
                {{'SR '}}
                {{$total_room_fare=$total_makkah_room_fare+$total_madina_room_fare}}
            </td>

        </tr>

        <tr>
            <td>Ziarat Charges:
                @if(request()->persons_for_ziarat!=null)
                    {{'SR '}}
                    {{$ziarat_charges=request()->persons_for_ziarat*$ziarat}}
                @else
                    {{'SR '}}
                    {{$ziarat_charges=0}}
                @endif
            </td>
        </tr>



        <tr>
            <td>Transportation Charges:

                @if(request()->transport_route!=null)
                    {{'SR '}}
                    {{$transportation_charges=$total}}
                @else
                    {{'SR '}}
                    {{$transportation_charges=0}}
                @endif
            </td>
        </tr>


        @if(request()->has('flight_checkbox'))

        @else
            @php($flight_cost_pkr=0)
        @endif



        <tr>
            <td class="col" style="text-align: center;font-size: 14px" colspan="3">
                <label style="font-weight: bold">Umrah Package Cost = PKR  {{number_format(($total_room_fare+$ziarat_charges+$transportation_charges+$visa_charges)*($rayal=DB::table('rayal_rate')->value('rate')))}}  </label>
            </td>
        </tr>

        @if($flight_cost_pkr!=0)
            <tr class="row">
                <td class="col" style="text-align: center;font-size: 14px" colspan="3">
                    <label style="font-weight: bold">Ticket Cost = PKR  {{number_format($flight_cost_pkr)}}  </label>
                </td>
            </tr>
        @endif
        <tr class="row">
            <td class="col" style="text-align: center;font-size: 14px" colspan="3">
                <label style="font-weight: bold">Total Payable = PKR  {{number_format(($total_room_fare+$ziarat_charges+$transportation_charges+$visa_charges)*($rayal=DB::table('rayal_rate')->value('rate'))+$flight_cost_pkr)}}  </label>
            </td>
        </tr>

    </table>
    @if($buttoncheck == 1)
        <a target="_blank" href="{{'Umrah Quotation.pdf'}}" style="float: right;"><button>Download Quotation
                <i class="fas fa-cloud-download-alt"></i>
            </button>

        </a>
        @endif
</div>
