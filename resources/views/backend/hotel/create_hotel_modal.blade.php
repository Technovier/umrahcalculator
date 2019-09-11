<div class="modal fade" id="myModal" role="dialog">

    <div class="modal-dialog" role="document">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Enter New Hotel Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form  action="{{route('admin.hotel.hotel_create')}}" method="get">
                    @csrf
                    <div class="row">

                        <div class="col">
                            <h6 style="background-color: darkslategray;color: white;padding: 8px;">Hotel Management Section</h6>
                            <div class="row ">
                                <div class="col-sm-4">
                                    <p>Name</p>
                                </div>
                                <div class="col">
                                    <input name="name" type="text" placeholder="Enter Hotel Name"  class="form-control" autocommplete="off" required>
                                </div>
                            </div>

                            <div class="row ">
                                <div class="col-sm-4">
                                    <p>Distance</p>
                                </div>
                                <div class="col">
                                    <input name="distance" placeholder="Enter distance here" type="text"  class="form-control" autocommplete="off" required>
                                </div>
                            </div>



                            <div class="row ">
                                <div class="col-sm-4">
                                    <p>Location</p>
                                </div>
                                <div class="col">

                                    <?php $location=DB::table('location')->get();?>
                                    <select name="hotellocation" id="" class="form-control">
                                        @foreach($location as $l)
                                                <option value="{{$l->id}}">{{$l->name}}</option>
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
                                        @foreach($hoteltype as $l)


                                                <option value="{{$l->id}}">{{$l->type}}</option>

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


<?php
                            $Roomtype=DB::table('room_type')->get();
                            ?>

                            @foreach($Roomtype as $rt)
                                <div class="row ">

                                    <div class="col">
                                        {{$rt->type_name}}
                                    </div>

                                    <div class="col">

                                            <input type="number" name="{{$rt->id}}" value="0" class="form-control" placeholder="Enter Room Fare Here" autocommplete="off" required>

                                    </div>

                                </div>

                            @endforeach


                        </div>

                    </div>

            </div>








            <div class="modal-footer">
                <button type="button" class="btn btn-danger float-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Create</button>
            </div>
            </form>

        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
    $(document).ready(function () {

        $("#myModal").modal({
            show: false,
            backdrop: 'static'
        });

    });
</script>
