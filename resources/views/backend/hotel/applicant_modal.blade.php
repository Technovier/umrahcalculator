<!-- Modal -->
{{--<div class="modal fade" id="{{'Model' . $applicant->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="false">--}}
    <div class="modal fade" id="myModal{{$hotel->id}}" role="dialog">

    <div class="modal-dialog" role="document">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">{{ $hotel->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form  action="{{route('admin.hotel.update', $hotel)}}" method="get">
                    @csrf
                    <input type="text" name="hotel_id" value="{{$hotel->id}}" style="display: none;">
<div class="row">

    <div class="col">
        <h6 style="background-color: darkslategray;color: white;padding: 8px;">Hotel Management Section</h6>
        <div class="row ">
            <div class="col-sm-4">
                <p>Name</p>
            </div>
            <div class="col">
                <input name="name" type="text" placeholder="Enter Hotel Name" value="{{ $hotel->name }}" class="form-control" autocommplete="off" required>
            </div>
        </div>

        <div class="row ">
            <div class="col-sm-4">
                <p>Distance</p>
            </div>
            <div class="col">
                <input name="distance" placeholder="Enter distance here" type="text" value="{{ $hotel->distance}}" class="form-control" autocommplete="off" required>
            </div>
        </div>



        <div class="row ">
            <div class="col-sm-4">
                <p>Location</p>
            </div>
            <div class="col">

                <?php $location=DB::table('location')->get();?>

                <select name="hotellocation" id="" class="form-control">
{{--                    <option value="">Select Hotel Location</option>--}}

                    @foreach($location as $l)
                        @if($hotel->location_id==$l->id)
                            <option value="{{$l->id}}" selected>{{$l->name}}</option>
                        @else
                            <option value="{{$l->id}}">{{$l->name}}</option>
                        @endif

                    @endforeach

                </select>

            </div>
        </div>





        <div class="row ">
            <div class="col-sm-4">
                <p>Type</p>
            </div>
            <div class="col">

                <?php $hoteltype=DB::table('hotel_type')->get();?>

                <select name="hoteltype" id="" class="form-control" required>
{{--                    <option value="">Select Hotel Type</option>--}}

                    @foreach($hoteltype as $l)
                        @if($hotel->type_id==$l->id)

                            <option value="{{$l->id}}" selected>{{$l->type}}</option>
                        @else
                            <option value="{{$l->id}}">{{$l->type}}</option>
                        @endif

                    @endforeach

                </select>

            </div>
        </div>

        <h6 style="background-color: darkslategray;color: white;padding: 8px;">Room Management Section</h6>
        <p style="color: red">*Rooms with zero price will not be available for booking.</p>

        <div class="row ">

            <div class="col" style="font-weight: bold;">
                Room Type
            </div>

            <div class="col" style="font-weight: bold;">
                Price
            </div>

            </div>


        <?php $Roomtype=DB::table('room_type')->get();
       $Rooms= $hotel->rooms;
        ?>

        @foreach($Roomtype as $rt)
            <div class="row ">

                <div class="col">
                    {{$rt->type_name}}
                </div>

                <div class="col">
                    @php($result=$Rooms->where('room_type',$rt->id))

                    @if($result->isNotEmpty())

                        <input type="number" name="{{$rt->id}}" value="{{$result->first()->price}}" class="form-control" placeholder="Enter Room Fare Here"  autocommplete="off" required>

                        @else

                        <input type="number" name="{{$rt->id}}" value="0" class="form-control" placeholder="Enter Room Fare Here" autocommplete="off" required>

                    @endif


                </div>

            </div>

        @endforeach
{{--{{dd($hotel)}}--}}


        </div>

</div>

            </div>








                                             <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger float-left" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-success">Save changes</button>
                                                </div>
            </form>

        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>


    $(document).ready(function () {

        $("#myModal{{$hotel->id}}").modal({
            show: false,
            backdrop: 'static'
        });
    });

    </script>
